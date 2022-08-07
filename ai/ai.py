# fastapi server starts throw "uvicorn ai:app --port=8088"
from detecto.utils import read_image
from detecto.core import Model
from matplotlib import pyplot as plt
import base64
import io
import matplotlib.patches as patches
import torch
from detecto.utils import reverse_normalize, _is_iterable
from torchvision import transforms
from fastapi import FastAPI
from fastapi import HTTPException


def byte_image(image, boxes, labels=None):
    fig, ax = plt.subplots(1)
    # If the image is already a tensor, convert it back to a PILImage
    # and reverse normalize it
    if isinstance(image, torch.Tensor):
        image = reverse_normalize(image)
        image = transforms.ToPILImage()(image)
    ax.imshow(image)
    # Show a single box or multiple if provided
    if boxes.ndim == 1:
        boxes = boxes.view(1, 4)
    if labels is not None and not _is_iterable(labels):
        labels = [labels]
    # Plot each box
    for i in range(boxes.shape[0]):
        box = boxes[i]
        width, height = (box[2] - box[0]).item(), (box[3] - box[1]).item()
        initial_pos = (box[0].item(), box[1].item())
        rect = patches.Rectangle(initial_pos,  width, height, linewidth=1,
                                 edgecolor='r', facecolor='none')
        if labels:
            ax.text(box[0] + 5, box[1] - 5, '{}'.format(labels[i]), color='red')
        ax.add_patch(rect)
    for item in [fig, ax]:
        item.patch.set_visible(False)
    plt.xticks(())
    plt.yticks(())
    my_stringIObytes = io.BytesIO()
    plt.savefig(my_stringIObytes, format='jpg')
    my_stringIObytes.seek(0)
    my_base64_jpgData = base64.b64encode(my_stringIObytes.read())
    return  my_base64_jpgData


app = FastAPI(title="AI Model")
labels = ['teeth', 'caries']
model = Model.load('trained_model.pth', labels)


@app.get("/get", response_description="Get predict_photo (base64), caries_count, teeth_count "
                                        "by file_path (absolute path to input photo)")
async def get(file_path: str):
    try:
        _image = read_image(file_path)
        _labels, _boxes, scores = model.predict(_image)
        caries_count, teeth_count = _labels.count('caries'), _labels.count('teeth')
        image = byte_image(_image, _boxes, _labels)
        result_of_classification = {"predict_photo": image,
                                    "caries_count": caries_count,
                                    "teeth_count": teeth_count}
    except Exception:
        raise HTTPException(404, str(Exception))
    return result_of_classification

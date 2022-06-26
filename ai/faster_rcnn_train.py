import sys
from detecto.core import Dataset
from detecto.utils import read_image
from detecto.visualize import show_labeled_image
from detecto.core import DataLoader, Model
from matplotlib import pyplot as plt

train_dataset = Dataset('/content/drive/MyDrive/Colabok/train_data_half/train_data')
val_dataset = Dataset('/content/drive/MyDrive/Colabok/validation_data')

labels = ['teeth', 'caries']
model = Model(labels)

model.fit(train_dataset, epochs=50)

model.save('trained_model_new.pth')

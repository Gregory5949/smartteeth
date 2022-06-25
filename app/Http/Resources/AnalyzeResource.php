<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnalyzeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'created_at' => $this->created_at,
            'count' => $this->count,
            'caries_count' => $this->caries_count,
            'patient' => $this->patient,
            'predict_photo' => $this->predict_photo,
            'predict_xml' => $this->predict_xml
        ];
    }
}

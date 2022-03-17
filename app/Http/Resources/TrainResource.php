<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainResource extends JsonResource
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
            "id" => $this->id,
            "manufacturer" => $this->manufacturer,
            "model" => $this->model,
            "year" => $this->year,
            "type" => $this->type,
            "carries"=>$this->carries
        ];
    }
}

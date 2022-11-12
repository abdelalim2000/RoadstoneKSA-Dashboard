<?php

namespace App\Http\Resources\Tires;

use Illuminate\Http\Resources\Json\JsonResource;

class TireFeaturesResource extends JsonResource
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
            "created_at" => $this->created_at,
            "icon" => TireImagesResource::make($this->icon),
            "name" => $this->name,
            "media" => TireImagesResource::collection($this->media),
            "translations" => TireTranslationResource::collection($this->translations),
        ];
    }
}

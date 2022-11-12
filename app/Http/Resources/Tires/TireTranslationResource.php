<?php

namespace App\Http\Resources\Tires;

use Illuminate\Http\Resources\Json\JsonResource;

class TireTranslationResource extends JsonResource
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
            "title" => $this->title,
            "locale" => $this->locale,
            "seo_keywords" => $this->seo_keywords,
            "seo_description" => $this->seo_description,
            "description" => $this->description,
            "tire_id" => $this->tire_id
        ];
    }
}

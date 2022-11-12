<?php

namespace App\Http\Resources\Retails;

use Illuminate\Http\Resources\Json\JsonResource;

class RetailsTranslationResource extends JsonResource
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
            "name" => $this->name,
            "locale" => $this->locale,
            "seo_keywords" => $this->seo_keywords,
            "seo_description" => $this->seo_description,
            "city_id" => $this->city_id
        ];
    }
}

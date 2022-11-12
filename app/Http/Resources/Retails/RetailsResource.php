<?php

namespace App\Http\Resources\Retails;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RetailsResource extends JsonResource
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
            "slug" => $this->slug,
            "map" => $this->map,
            "active" => $this->active,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "name" => $this->name,
            "seo_keywords" => $this->seo_keywords,
            "seo_description" => $this->seo_description,
            "image" => ImageResource::make($this->image),
            "media" => ImageResource::collection($this->media),
            "locations" => RetailsLocationResource::collection($this->locations),
            "translations" => RetailsTranslationResource::collection($this->translations)
        ];
    }
}

<?php

namespace App\Http\Resources\Retails;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class RetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "slug" => $this->slug,
            "map" => $this->map,
            "active" => $this->active,
            "name" => $this->translate(request()->get('locale') ?? 'en')->name,
            "seo_keywords" => $this->translate(request()->get('locale') ?? 'en')->seo_keywords,
            "seo_description" => $this->translate(request()->get('locale') ?? 'en')->seo_description,
            "image" => ImageResource::make($this->image),
            "locations" => RetailsLocationResource::collection($this->locations),
        ];
    }
}

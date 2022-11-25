<?php

namespace App\Http\Resources\Tires;

use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Retails\RetailsLocationResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TireDetailsResource extends JsonResource
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
            "title" => $this->translate(request()->get('locale') ?? 'en')->title,
            "slug" => $this->slug,
            "breadcrumb" => $this->breadcrumb,
            "thumb" => ImageResource::make($this->thumb),
            "tire_logo" => ImageResource::make($this->tire_logo),
            "images" => ImageResource::collection($this->images),
            "seo_keywords" => $this->translate(request()->get('locale') ?? 'en')->seo_keywords,
            "seo_description" => $this->translate(request()->get('locale') ?? 'en')->seo_description,
            "description" => $this->translate(request()->get('locale') ?? 'en')->description,
            "video_link" => $this->video_link,
            "dry_performance" => $this->dry_performance,
            "wet_performance" => $this->wet_performance,
            "rolling_resistance" => $this->rolling_resistance,
            "comfort_noise" => $this->comfort_noise,
            "wear" => $this->wear,
            "snow" => $this->snow,
            "fuel_consumption" => $this->fuel_consumption,
            "durability" => $this->durability,
            "wet_handling" => $this->wet_handling,
            "wet_grip" => $this->wet_grip,
            "aquaplaning" => $this->aquaplaning,
            "ice" => $this->ice,
            "USB" => TireFeaturesResource::collection($this->whenLoaded('tire_features')),
            "designs" => TireDesignResource::collection($this->whenLoaded('tire_designs')),
            "sizes" => TireSizeResource::collection($this->whenLoaded('tire_sizes')),
            'locations' => RetailsLocationResource::collection($this->whenLoaded('locations')),
        ];
    }
}

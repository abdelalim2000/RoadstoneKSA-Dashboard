<?php

namespace App\Http\Resources\Tires;

use Illuminate\Http\Resources\Json\JsonResource;

class TiresResource extends JsonResource
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
            "video_link" => $this->video_link,
            "dry_performance" => $this->dry_performance,
            "wet_performance" => $this->wet_performance,
            "rolling_resistance" => $this->rolling_resistance,
            // "comfort_noise" => $this->comfort_noise,
            "wear" => $this->wear,
            "snow" => $this->snow,
            "fuel_consumption" => $this->fuel_consumption,
            // "durability" => $this->durability,
            // "wet_handling" => $this->wet_handling,
            // "wet_grip" => $this->wet_grip,
            // "aquaplaning" => $this->aquaplaning,
            // "ice" => $this->ice,
            "created_at" => $this->created_at,
            // "updated_at" => $this->updated_at,
            // "car_type_id" => $this->car_type_id,
            // "breadcrumb" => $this->breadcrumb,
            "thumb" => TireImagesResource::make($this->thumb),
            "tire_logo" => TireImagesResource::make($this->tire_logo),
            // "images" => TireImagesResource::collection($this->images),
            // "media" => TireImagesResource::collection($this->media),
            "tire_features" => TireFeaturesResource::collection($this->tire_features),
            "translations" => TireTranslationResource::collection($this->translations)
        ];
    }
}

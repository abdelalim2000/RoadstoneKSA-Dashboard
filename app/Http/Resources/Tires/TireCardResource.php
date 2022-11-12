<?php

namespace App\Http\Resources\Tires;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TireCardResource extends JsonResource
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
            "thumb" => ImageResource::make($this->thumb),
            "USB" => TireFeaturesResource::collection($this->tire_features),
        ];
    }
}

<?php

namespace App\Http\Resources\Tires;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TireFeaturesResource extends JsonResource
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
            "name" => $this->translate(request()->get('locale') ?? 'en')->name,
            "icon" => ImageResource::make($this->icon),
        ];
    }
}

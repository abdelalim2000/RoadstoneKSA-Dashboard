<?php

namespace App\Http\Resources\Tires;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TireSizeResource extends JsonResource
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
            'width' => $this->width,
            'ratio' => $this->ratio,
            'rim_diameter' => $this->rim_diameter,
            'load_index' => $this->load_index,
            'speed_rating' => $this->speed_rating,
        ];
    }
}

<?php

namespace App\Http\Resources\Search;

use Illuminate\Http\Resources\Json\JsonResource;

class RimDiameterResource extends JsonResource
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
            'id' => $this->rim_diameter,
            'text' => $this->rim_diameter,
        ];
    }
}

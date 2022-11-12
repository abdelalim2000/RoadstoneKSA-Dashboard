<?php

namespace App\Http\Resources\Retails;

use Illuminate\Http\Resources\Json\JsonResource;

class RetailsLocationResource extends JsonResource
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
            "phone" => $this->phone,
            "map" => $this->map,
            "active" => $this->active,
            "created_at" => $this->created_at,
            "city_id" => $this->city_id,
            "name" => $this->name,
            "address" => $this->address,
            "working_hour" => $this->working_hour,
        ];
    }
}

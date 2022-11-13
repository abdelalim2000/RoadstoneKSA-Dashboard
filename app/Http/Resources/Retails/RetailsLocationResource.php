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
            "phone" => $this->phone,
            "map" => $this->map,
            "city_id" => $this->city_id,
            "name" => $this->translate(request()->get('locale') ?? 'en')->name,
            "address" => $this->translate(request()->get('locale') ?? 'en')->address,
            "working_hour" => $this->working_hour,
        ];
    }
}

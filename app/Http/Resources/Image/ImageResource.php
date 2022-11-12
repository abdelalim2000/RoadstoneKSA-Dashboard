<?php

namespace App\Http\Resources\Image;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ImageResource extends JsonResource
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
            "url" => $this->url,
            "thumbnail" => $this->thumbnail ?? '',
            "preview" => $this->preview ?? '',
            "original_url" => $this->original_url ?? '',
            "preview_url" => $this->preview_url ?? ''
        ];
    }
}

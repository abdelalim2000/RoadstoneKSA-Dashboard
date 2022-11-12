<?php

namespace App\Http\Resources\Tires;

use Illuminate\Http\Resources\Json\JsonResource;

class TireImagesResource extends JsonResource
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
            "file_name" => $this->file_name,
            "mime_type" => $this->mime_type,
            "url" => $this->url,
            "thumbnail" => $this->thumbnail,
            "preview" => $this->preview,
            "original_url" => $this->original_url,
            "preview_url" => $this->preview_url
        ];
    }
}

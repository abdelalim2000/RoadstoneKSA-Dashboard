<?php

namespace App\Http\Resources\Search;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MakerResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => ImageResource::make($this->image),
            'models' => ModelResource::collection($this->whenLoaded('models')),
        ];
    }
}

<?php

namespace App\Http\Resources\Search;

use Illuminate\Http\Resources\Json\JsonResource;

class MakerResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->name,
        ];
    }
}

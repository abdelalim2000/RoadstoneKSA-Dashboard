<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\Image\ImageResource;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ArticleResource extends JsonResource
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
            'title' => $this->translate($request->locale)->title,
            'slug' => $this->slug,
            'image' => ImageResource::make($this->image),
            'description' => $this->translate($request->locale)->description,
            'article' => $this->article,
            'seo_keywords' => $this->seo_keywords,
            'seo_description' => $this->seo_description,
            'created_at' => $this->created_at->format('M d, Y')
        ];
    }
}

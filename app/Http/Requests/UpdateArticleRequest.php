<?php

namespace App\Http\Requests;

use App\Models\Article;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateArticleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:articles,title,' . request()->route('article')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:articles,slug,' . request()->route('article')->id,
            ],
            'image' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'article' => [
                'required',
            ],
        ];
    }
}

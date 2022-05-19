<?php

namespace App\Http\Requests;

use App\Models\City;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('city_create');
    }

    public function rules()
    {
        $data = [
            'image' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
                Rule::unique('cities', 'slug'),
            ],
            'map' => [
                'required',
            ],
            'active' => [
                'nullable',
            ]
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale.'.name'] = [
                'string',
                'required',
                Rule::unique('city_translations', 'name'),
            ];
            $data[$locale.'.seo_description'] = [
                'string',
                'nullable',
            ];
            $data[$locale.'.seo_keywords'] = [
                'string',
                'nullable',
            ];
        }

        return $data;
    }
}

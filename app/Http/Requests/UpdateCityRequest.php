<?php

namespace App\Http\Requests;

use App\Models\City;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('city_edit');
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
                Rule::unique('cities', 'slug')->ignore($this->city),
            ],
            'map' => [
                'required',
            ],
            'active' => [
                'nullable',
            ]
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('city_translations', 'name')->ignore($this->city->translate($locale) ? $this->city->translate($locale)->id : $this->city->id),
            ];
            $data[$locale . '.seo_description'] = [
                'string',
                'nullable',
            ];
            $data[$locale . '.seo_keywords'] = [
                'string',
                'nullable',
            ];
        }

        return $data;
    }
}

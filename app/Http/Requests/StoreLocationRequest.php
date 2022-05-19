<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('location_create');
    }

    public function rules()
    {
        $data = [
            'city_id' => [
                'required',
                'integer',
                Rule::exists('cities', 'id')
            ],
            'phone' => [
                'string',
                'required',
            ],
            'map' => [
                'required',
            ],
            'active' => [
                'nullable',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('location_translations', 'name'),
            ];
            $data[$locale . '.address'] = [
                'required',
            ];
            $data[$locale . '.working_hour'] = [
                'string',
                'nullable',
            ];
        }

        return $data;
    }
}

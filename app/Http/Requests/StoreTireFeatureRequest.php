<?php

namespace App\Http\Requests;

use App\Models\TireFeature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreTireFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_feature_create');
    }

    public function rules()
    {
        $data = [
            'icon' => [
                'required',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale.'.name'] = [
                'string',
                'required',
                Rule::unique('tire_feature_translations', 'name'),
            ];
        }

        return $data;
    }
}

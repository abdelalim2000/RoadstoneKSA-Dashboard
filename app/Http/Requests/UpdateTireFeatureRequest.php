<?php

namespace App\Http\Requests;

use App\Models\TireFeature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateTireFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_feature_edit');
    }

    public function rules()
    {
        $data = [
            'icon' => [
                'required',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('tire_feature_translations', 'name')->ignore($this->tire_feature->translate($locale) ? $this->tire_feature->translate($locale)->id : $this->tire_feature->id),
            ];
        }

        return $data;
    }
}

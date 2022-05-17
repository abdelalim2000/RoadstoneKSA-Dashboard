<?php

namespace App\Http\Requests;

use App\Models\TireFeature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTireFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_feature_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:tire_features',
            ],
            'icon' => [
                'required',
            ],
        ];
    }
}

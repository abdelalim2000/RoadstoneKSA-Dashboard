<?php

namespace App\Http\Requests;

use App\Models\TireFeature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTireFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_feature_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:tire_features,name,' . request()->route('tire_feature')->id,
            ],
            'icon' => [
                'required',
            ],
        ];
    }
}

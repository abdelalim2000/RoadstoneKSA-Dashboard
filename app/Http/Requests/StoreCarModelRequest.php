<?php

namespace App\Http\Requests;

use App\Models\CarModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreCarModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_model_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                Rule::unique('car_models', 'name')
            ],
            'maker_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

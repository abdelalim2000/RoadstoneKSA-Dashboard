<?php

namespace App\Http\Requests;

use App\Models\CarType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:car_types',
            ],
            'slug' => [
                'string',
                'required',
                'unique:car_types',
            ],
        ];
    }
}

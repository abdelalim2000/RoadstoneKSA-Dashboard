<?php

namespace App\Http\Requests;

use App\Models\CarType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('car_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:car_types,name,' . request()->route('car_type')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:car_types,slug,' . request()->route('car_type')->id,
            ],
        ];
    }
}

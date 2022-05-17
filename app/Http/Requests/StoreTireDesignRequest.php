<?php

namespace App\Http\Requests;

use App\Models\TireDesign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTireDesignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_design_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:tire_designs',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\TireDesign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTireDesignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_design_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:tire_designs,name,' . request()->route('tire_design')->id,
            ],
            'image' => [
                'required',
            ],
        ];
    }
}

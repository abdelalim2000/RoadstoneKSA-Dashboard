<?php

namespace App\Http\Requests;

use App\Models\Maker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMakerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('maker_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:makers,name,' . request()->route('maker')->id,
            ],
        ];
    }
}

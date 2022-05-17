<?php

namespace App\Http\Requests;

use App\Models\TireSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTireSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_size_create');
    }

    public function rules()
    {
        return [
            'width' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ratio' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'rim_diameter' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'load_index' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'speed_rating' => [
                'string',
                'min:1',
                'max:2',
                'required',
            ],
            'tire_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

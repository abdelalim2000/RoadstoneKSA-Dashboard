<?php

namespace App\Http\Requests;

use App\Models\TireDesign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreTireDesignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_design_create');
    }

    public function rules()
    {
        $data = [
            'image' => [
                'required',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale.'.name'] = [
                'string',
                'required',
                Rule::unique('tire_design_translations', 'name'),
            ];
        }

        return $data;
    }
}

<?php

namespace App\Http\Requests\NewsApi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:150'
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:200',
                Rule::unique('newss', 'email')
            ]
        ];
    }
}

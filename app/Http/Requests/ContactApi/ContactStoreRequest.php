<?php

namespace App\Http\Requests\ContactApi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactStoreRequest extends FormRequest
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
                'max:200'
            ],
            'phone' => [
                'required',
                'string',
                'max:20'
            ],
            'subject' => [
                'required',
                'string',
                'max:100'
            ],
            'contact_type_id' => [
                'required',
                'integer',
                Rule::exists('contact_types', 'id')
            ],
            'message' => [
                'required',
                'string',
                'max:1000'
            ],
        ];
    }

    public function prepareForValidation()
    {
        $this->request->add(['status' => false]);
    }
}

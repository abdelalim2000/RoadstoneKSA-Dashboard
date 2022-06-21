<?php

namespace App\Http\Requests\Contacts;

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
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'phone' => [
                'required',
                'string'
            ],
            'subject' => [
                'required',
                'string'
            ],
            'contact_type_id' => [
                'required',
                'integer',
                Rule::exists('contact_types', 'id')
            ],
            'message' => [
                'required',
                'string'
            ],
        ];
    }

    public function prepareForValidation()
    {
        $this->request->add(['status' => false]);
    }
}

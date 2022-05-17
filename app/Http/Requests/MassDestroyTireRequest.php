<?php

namespace App\Http\Requests;

use App\Models\Tire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTireRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tires,id',
        ];
    }
}

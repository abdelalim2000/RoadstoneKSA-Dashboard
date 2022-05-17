<?php

namespace App\Http\Requests;

use App\Models\CarType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('car_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:car_types,id',
        ];
    }
}

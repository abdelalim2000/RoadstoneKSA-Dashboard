<?php

namespace App\Http\Requests;

use App\Models\TireDesign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTireDesignRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tire_design_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tire_designs,id',
        ];
    }
}

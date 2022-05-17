<?php

namespace App\Http\Requests;

use App\Models\Maker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMakerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('maker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:makers,id',
        ];
    }
}

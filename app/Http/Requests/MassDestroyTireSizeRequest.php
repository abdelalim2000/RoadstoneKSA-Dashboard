<?php

namespace App\Http\Requests;

use App\Models\TireSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTireSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tire_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tire_sizes,id',
        ];
    }
}

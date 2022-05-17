<?php

namespace App\Http\Requests;

use App\Models\Tire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTireRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:tires',
            ],
            'slug' => [
                'string',
                'required',
                'unique:tires',
            ],
            'short_description' => [
                'required',
            ],
            'video_link' => [
                'string',
                'nullable',
            ],
            'images' => [
                'array',
            ],
            'cta_link' => [
                'string',
                'nullable',
            ],
            'cta_text' => [
                'string',
                'nullable',
            ],
            'dry_performance' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'wet_performance' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'rolling_resistance' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'comfort_noise' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'wear' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'snow' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'fuel_consumption' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'durability' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'wet_handling' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'wet_grip' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'aquaplaning' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'ice' => [
                'numeric',
                'min:0',
                'max:5',
            ],
            'tire_features.*' => [
                'integer',
            ],
            'tire_features' => [
                'array',
            ],
            'tire_designs.*' => [
                'integer',
            ],
            'tire_designs' => [
                'array',
            ],
            'car_models.*' => [
                'integer',
            ],
            'car_models' => [
                'array',
            ],
        ];
    }
}

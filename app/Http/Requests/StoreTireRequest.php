<?php

namespace App\Http\Requests;

use App\Models\Tire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreTireRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tire_create');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('tires', 'slug'),
            ],
            'video_link' => [
                'string',
                'nullable',
            ],
            'images' => [
                'array',
            ],
            'breadcrumb' => [
                'nullable',
            ],
            'tire_logo' => [
                'required',
            ],
            'thumb' => [
                'required',
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
                'required',
                'array',
            ],
            'tire_designs.*' => [
                'integer',
            ],
            'tire_designs' => [
                'required',
                'array',
            ],
            'car_models.*' => [
                'integer',
            ],
            'car_models' => [
                'required',
                'array',
            ],
            'car_type_id' => [
                'required',
                Rule::exists('car_types', 'id')
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.title'] = [
                'required',
                'string',
                Rule::unique('tire_translations', 'title')
            ];
            $data[$locale . '.short_description'] = [
                'required',
                'string',
            ];
            $data[$locale . '.seo_keywords'] = [
                'nullable',
                'string',
            ];
            $data[$locale . '.seo_description'] = [
                'nullable',
                'string',
            ];
            $data[$locale . '.description'] = [
                'nullable',
                'string',
            ];
        }

        return $data;
    }
}

<?php

namespace App\Imports;

use App\Models\Tire;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TireImport implements ToCollection, SkipsEmptyRows, SkipsOnError, SkipsOnFailure, WithValidation, WithHeadingRow
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            $features = array_map('intval',explode(',', $item['tire_features'])) ?? [];
            $designs = array_map('intval',explode(',', $item['tire_designs'])) ?? [];
            $models = array_map('intval',explode(',', $item['car_models'])) ?? [];

            $tire = Tire::query()->create([
                'en' => [
                    'title' => $item['en_title'],
                    'short_description' => $item['en_short_description'],
                    'seo_keywords' => $item['en_seo_keywords'] ?? null,
                    'seo_description' => $item['en_seo_description'] ?? null,
                ],
                'ar' => [
                    'title' => $item['ar_title'],
                    'short_description' => $item['ar_short_description'],
                    'seo_keywords' => $item['ar_seo_keywords'] ?? null,
                    'seo_description' => $item['ar_seo_description'] ?? null,
                ],
                'slug' => $item['slug'],
                'video_link' => $item['video_link'] ?? null,
                'dry_performance' => $item['dry_performance'] ?? null,
                'wet_performance' => $item['wet_performance'] ?? null,
                'rolling_resistance' => $item['rolling_resistance'] ?? null,
                'comfort_noise' => $item['comfort_noise'] ?? null,
                'wear' => $item['wear'] ?? null,
                'snow' => $item['snow'] ?? null,
                'fuel_consumption' => $item['fuel_consumption'] ?? null,
                'durability' => $item['durability'] ?? null,
                'wet_handling' => $item['wet_handling'] ?? null,
                'wet_grip' => $item['wet_grip'] ?? null,
                'aquaplaning' => $item['aquaplaning'] ?? null,
                'ice' => $item['ice'] ?? null,
                'car_type_id' => $item['car_type_id'] ?? null,
            ]);

            $tire->tire_features()->sync($features);
            $tire->tire_designs()->sync($designs);
            $tire->car_models()->sync($models);
        }
    }

    public function rules(): array
    {
        return [
            '*.en_title' => [
                'required',
                'string',
                Rule::unique('tire_translations', 'title')
            ],
            '*.ar_title' => [
                'required',
                'string',
                Rule::unique('tire_translations', 'title')
            ],
            '*.en_short_description' => [
                'required',
                'string',
            ],
            '*.en_seo_keywords' => [
                'nullable',
                'string',
            ],
            '*.en_seo_description' => [
                'nullable',
                'string',
            ],
            '*.ar_short_description' => [
                'required',
                'string',
            ],
            '*.ar_seo_keywords' => [
                'nullable',
                'string',
            ],
            '*.ar_seo_description' => [
                'nullable',
                'string',
            ],
            '*.slug' => [
                'required',
                'string',
                Rule::unique('tires', 'slug')
            ],
            '*.video_link' => [
                'nullable',
                'url',
            ],
            '*.dry_performance' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.wet_performance' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.rolling_resistance' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.comfort_noise' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.wear' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.snow' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.fuel_consumption' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.durability' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.wet_handling' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.wet_grip' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.aquaplaning' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.ice' => [
                'nullable',
                'numeric',
                'between:0,5'
            ],
            '*.car_type_id' => [
                'required',
                'integer',
                Rule::exists('car_types', 'id')
            ],
        ];
    }
}

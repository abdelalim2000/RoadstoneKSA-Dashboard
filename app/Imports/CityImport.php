<?php

namespace App\Imports;

use App\Models\City;
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

class CityImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            City::query()->create([
                'en' => [
                    'name' => $item['en_name'],
                    'seo_keywords' => $item['en_seo_keywords'],
                    'seo_description' => $item['en_seo_description'],
                ],
                'ar' => [
                    'name' => $item['ar_name'],
                    'seo_keywords' => $item['ar_seo_keywords'],
                    'seo_description' => $item['ar_seo_description'],
                ],
                'slug' => $item['slug'],
                'map' => $item['map'],
                'active' => (bool)$item['active'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.en_name' => ['required', 'string', Rule::unique('city_translations', 'name')],
            '*.en_seo_keywords' => ['nullable', 'string'],
            '*.en_seo_description' => ['nullable', 'string'],
            '*.ar_name' => ['required', 'string', Rule::unique('city_translations', 'name')],
            '*.ar_seo_keywords' => ['nullable', 'string'],
            '*.ar_seo_description' => ['nullable', 'string'],
            '*.slug' => ['required', 'string', Rule::unique('cities', 'slug')],
            '*.map' => ['required'],
            '*.active' => ['nullable'],
        ];
    }
}

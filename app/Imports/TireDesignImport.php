<?php

namespace App\Imports;

use App\Models\TireDesign;
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

class TireDesignImport implements ToCollection, SkipsEmptyRows, SkipsOnError, SkipsOnFailure, WithValidation, WithHeadingRow
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            TireDesign::query()->create([
                'en' => [
                    'name' => $item['en_name']
                ],
                'ar' => [
                    'name' => $item['ar_name']
                ]
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.en_name' => [
                'required',
                'string',
                Rule::unique('tire_design_translations', 'name')
            ],
            '*.ar_name' => [
                'required',
                'string',
                Rule::unique('tire_design_translations', 'name')
            ],
        ];
    }
}

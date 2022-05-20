<?php

namespace App\Imports;

use App\Models\CarType;
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

class CarTypeImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            CarType::query()->create([
                'name' => $row['name'],
                'slug' => $row['slug'],
                'description' => $row['description'] ?? null,
                'active' => (bool)$row['description'] ?? 0,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.name' => [
                'required',
                'string',
                Rule::unique('car_types', 'name')
            ],
            '*.slug' => [
                'required',
                'string',
                Rule::unique('car_types', 'name')
            ],
            '*.description' => [
                'nullable',
                'string',
            ],
        ];
    }
}

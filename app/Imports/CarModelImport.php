<?php

namespace App\Imports;

use App\Models\CarModel;
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

class CarModelImport implements ToCollection, SkipsEmptyRows, SkipsOnError, SkipsOnFailure, WithValidation, WithHeadingRow
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            CarModel::query()->create([
                'name' => $row['name'],
                'maker_id' => $row['car_id'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.name' => [
                'required',
                'string',
                Rule::unique('car_models', 'name')
            ],
            '*.car_id' => [
                'required',
                Rule::exists('makers', 'id')
            ]
        ];
    }
}

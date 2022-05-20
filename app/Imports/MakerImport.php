<?php

namespace App\Imports;

use App\Models\Maker;
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

class MakerImport implements ToCollection, SkipsEmptyRows, SkipsOnError, SkipsOnFailure, WithValidation, WithHeadingRow
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Maker::query()->create([
                'name' => $row['name'],
                'searchable' => (bool)$row['searchable'] ?? 0,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.name' => [
                'required',
                'string',
                Rule::unique('makers', 'name')
            ]
        ];
    }
}

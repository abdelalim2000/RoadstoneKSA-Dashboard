<?php

namespace App\Imports;

use App\Models\News;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class NewsImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            News::query()->create([
                'name' => $item['name'],
                'email' => $item['email']
            ]);
        }
    }

    public function rules(): array
    {
        return [
          '*.name' => ['required', 'string'],
          '*.email' => ['required', 'email']
        ];
    }
}

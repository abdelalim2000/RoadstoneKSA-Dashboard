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

class ModelTireImport implements ToCollection, SkipsEmptyRows, SkipsOnError, SkipsOnFailure, WithValidation, WithHeadingRow
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            $tire = Tire::query()->where('id', (int)$item['tire_id'])->first();
            $tire->car_models()->attach((int)$item['model_id']);
        }
    }

    public function rules(): array
    {
        return [
            '*.model_id' => [
                'required',
                Rule::exists('car_models', 'id'),
            ],
            '*.tire_id' => [
                'required',
                Rule::exists('tires', 'id')
            ]
        ];
    }

    public function prepareForValidation($data)
    {
        $data['tire_id'] = (string)$data['tire_id'];
        $data['model_id'] = (int)$data['model_id'];

        return $data;
    }
}

<?php

namespace App\Imports;

use App\Models\TireSize;
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

class TireSizeImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            TireSize::query()->create([
                'width' => $item['width'],
                'ratio' => $item['ratio'],
                'rim_diameter' => $item['rim_diameter'],
                'load_index' => $item['load_index'],
                'speed_rating' => $item['speed_rating'],
                'tire_id' => $item['tire_id'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.width' => [
                'required',
                'integer'
            ],
            '*.ratio' => [
                'required',
                'integer'
            ],
            '*.rim_diameter' => [
                'required',
                'integer'
            ],
            '*.load_index' => [
                'required',
                'integer'
            ],
            '*.speed_rating' => [
                'required',
                'integer'
            ],
            '*.tire_id' => [
                'required',
                'integer',
                Rule::exists('tires', 'id'),
            ],
        ];
    }

    public function prepareForValidation($data)
    {
        $data['width'] = (int)$data['width'];
        $data['ratio'] = (int)$data['ratio'];
        $data['rim_diameter'] = (int)$data['rim_diameter'];
        $data['load_index'] = (int)$data['load_index'];
        $data['speed_rating'] = (int)$data['speed_rating'];
        $data['tire_id'] = (int)$data['tire_id'];

        return $data;
    }
}

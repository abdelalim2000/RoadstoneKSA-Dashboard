<?php

namespace App\Imports;

use App\Models\Location;
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

class LocationImport implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable;
    use SkipsErrors;
    use SkipsFailures;

    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            Location::query()->create([
                'en' => [
                    'name' => $item['en_name'],
                    'address' => $item['en_address'],
                    'working_hour' => $item['en_working_hour'],
                ],
                'ar' => [
                    'name' => $item['ar_name'],
                    'address' => $item['ar_address'],
                    'working_hour' => $item['ar_working_hour'],
                ],
                'city_id' => $item['city_id'],
                'phone' => $item['phone'] ?? null,
                'map' => $item['map'],
                'active' => (bool)$item['active'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.en_name' => ['required', 'string', Rule::unique('location_translations', 'name')],
            '*.en_address' => ['required', 'string'],
            '*.en_working_hour' => ['required', 'string'],
            '*.ar_name' => ['required', 'string', Rule::unique('location_translations', 'name')],
            '*.ar_address' => ['required', 'string'],
            '*.ar_working_hour' => ['required', 'string'],
            '*.city_id' => ['required', 'integer', Rule::exists('cities', 'id')],
            '*.phone' => ['required', 'string'],
            '*.map' => ['required'],
            '*.active' => ['nullable'],
        ];
    }

    public function prepareForValidation($data)
    {
        $data['phone'] = (string)$data['phone'];

        return $data;
    }
}

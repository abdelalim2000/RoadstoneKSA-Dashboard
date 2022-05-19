<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Location extends Model implements TranslatableContracts
{
    use Translatable;

    public $table = 'locations';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'city_id',
        'phone',
        'map',
        'active',
        'created_at',
        'updated_at',
    ];

    protected $translatedAttributes = [
        'name',
        'address',
        'working_hour',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

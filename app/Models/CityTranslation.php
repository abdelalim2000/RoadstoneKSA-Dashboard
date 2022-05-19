<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'city_translations';

    protected $fillable = [
        'name',
        'locale',
        'city_id',
        'seo_keywords',
        'seo_description',
    ];
}

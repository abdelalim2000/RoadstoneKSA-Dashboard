<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TireTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'tire_translations';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'seo_keywords',
        'seo_description',
        'locale',
        'tire_id',
    ];
}

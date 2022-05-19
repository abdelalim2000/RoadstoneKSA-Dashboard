<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'location_translations';

    protected $fillable = [
        'name',
        'locael',
        'location_id',
        'address',
        'working_hour',
    ];
}

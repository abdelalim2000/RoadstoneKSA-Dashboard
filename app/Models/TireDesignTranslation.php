<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TireDesignTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'tire_design_translations';

    protected $fillable = [
        'name',
        'locale',
        'tire_design_id'
    ];
}

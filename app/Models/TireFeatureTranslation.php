<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TireFeatureTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'tire_feature_translations';

    protected $fillable = [
        'name'
    ];
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public $table = 'car_models';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'maker_id',
        'created_at',
        'updated_at',
    ];

    public function maker()
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

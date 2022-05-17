<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TireSize extends Model
{
    use HasFactory;

    public $table = 'tire_sizes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'width',
        'ratio',
        'rim_diameter',
        'load_index',
        'speed_rating',
        'tire_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tire()
    {
        return $this->belongsTo(Tire::class, 'tire_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

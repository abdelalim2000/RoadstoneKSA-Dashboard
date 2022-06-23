<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

    public function tires(): BelongsToMany
    {
        return $this->belongsToMany(Tire::class);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}

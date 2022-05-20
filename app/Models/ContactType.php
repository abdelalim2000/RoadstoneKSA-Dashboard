<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class ContactType extends Model implements TranslatableContracts
{
    use Translatable;

    public $table = 'contact_types';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
    ];

    protected $translatedAttributes = [
        'name'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

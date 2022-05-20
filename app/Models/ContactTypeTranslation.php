<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTypeTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'contact_type_translations';

    protected $fillable = [
        'name',
        'locale',
        'contact_type_id',
    ];
}

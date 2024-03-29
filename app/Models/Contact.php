<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contacts';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'contact_type_id',
        'message',
        'status',
        'created_at',
        'updated_at',
    ];

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class, 'contact_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

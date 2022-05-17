<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

trait SetSlugTrait
{
    public function slug(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::slug($value)
        );
    }
}

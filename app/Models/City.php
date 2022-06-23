<?php

namespace App\Models;

use App\Traits\SetSlugTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class City extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;
    use SetSlugTrait;

    public $table = 'cities';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'map',
        'active',
        'created_at',
        'updated_at',
    ];

    protected array $translatedAttributes = [
        'name',
        'seo_keywords',
        'seo_description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('city')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getFirstMedia('city');
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

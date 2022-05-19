<?php

namespace App\Models;

use App\Traits\SetSlugTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;
    use SetSlugTrait;

    public $table = 'articles';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'publish',
        'created_at',
        'updated_at',
    ];

    protected array $translatedAttributes = [
        'title',
        'seo_keywords',
        'seo_description',
        'description',
        'article',
    ];

    public function registerMediaCollections():void
    {
        $this->addMediaCollection('article')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getFirstMedia('article');
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

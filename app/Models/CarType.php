<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CarType extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $table = 'car_types';

    protected $appends = [
        'image',
        'breadcrumb',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'active',
        'created_at',
        'updated_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('car_type_image')
            ->singleFile();

        $this->addMediaCollection('car_type_breadcrumb')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getFirstMedia('car_type_image');
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getBreadcrumbAttribute()
    {
        $file = $this->getFirstMedia('car_type_breadcrumb');
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

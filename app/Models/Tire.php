<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tire extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'tires';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'breadcrumb',
        'thumb',
        'tire_logo',
        'images',
    ];

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'seo_keywords',
        'seo_description',
        'description',
        'video_link',
        'cta_link',
        'cta_text',
        'dry_performance',
        'wet_performance',
        'rolling_resistance',
        'comfort_noise',
        'wear',
        'snow',
        'fuel_consumption',
        'durability',
        'wet_handling',
        'wet_grip',
        'aquaplaning',
        'ice',
        'car_type_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getBreadcrumbAttribute()
    {
        $file = $this->getMedia('breadcrumb')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getThumbAttribute()
    {
        $file = $this->getMedia('thumb')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getTireLogoAttribute()
    {
        $file = $this->getMedia('tire_logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('images');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function tire_features()
    {
        return $this->belongsToMany(TireFeature::class);
    }

    public function tire_designs()
    {
        return $this->belongsToMany(TireDesign::class);
    }

    public function car_models()
    {
        return $this->belongsToMany(CarModel::class);
    }

    public function car_type()
    {
        return $this->belongsTo(CarType::class, 'car_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

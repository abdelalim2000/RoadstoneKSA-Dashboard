<?php

namespace App\Models;

use App\Exceptions\ApiCustomException;
use App\Exceptions\TireNotFoundException;
use App\Traits\SetSlugTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContracts;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tire extends Model implements HasMedia, TranslatableContracts
{
    use InteractsWithMedia;
    use Translatable;
    use SetSlugTrait;

    public $table = 'tires';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'breadcrumb',
        'thumb',
        'tire_logo',
        'images',
    ];

    protected $fillable = [
        'slug',
        'video_link',
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
    ];

    protected array $translatedAttributes = [
        'title',
        'short_description',
        'seo_keywords',
        'seo_description',
        'description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('tire_thumb')
            ->singleFile();

        $this->addMediaCollection('tire_logo')
            ->singleFile();

        $this->addMediaCollection('tire_breadcrumb')
            ->singleFile();

        $this->addMediaCollection('tire_images');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getBreadcrumbAttribute()
    {
        $file = $this->getFirstMedia('tire_breadcrumb');
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getThumbAttribute()
    {
        $file = $this->getFirstMedia('tire_thumb');
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getTireLogoAttribute()
    {
        $file = $this->getFirstMedia('tire_logo');
        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImagesAttribute()
    {
        $files = $this->getMedia('tire_images');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'location_tire');
    }

    public function tire_features(): BelongsToMany
    {
        return $this->belongsToMany(TireFeature::class);
    }

    public function tire_designs(): BelongsToMany
    {
        return $this->belongsToMany(TireDesign::class);
    }

    public function car_models(): BelongsToMany
    {
        return $this->belongsToMany(CarModel::class);
    }

    public function car_type(): BelongsTo
    {
        return $this->belongsTo(CarType::class, 'car_type_id');
    }

    public function tire_sizes(): HasMany
    {
        return $this->hasMany(TireSize::class, 'tire_id');
    }
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->first() ?? throw new ApiCustomException(
            code: 404,
            status: 'Not Found',
            data: ['message' => 'Tire Not Found, If error continue to appear please contact support']
        );
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}

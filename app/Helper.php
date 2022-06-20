<?php

use App\Models\Setting;
use App\Models\SiteLanguage;
use Carbon\Carbon;

function settingText($key, $value): string
{
    $setting = Setting::query()->where('key', $key)->first();
    if (!$setting) {
        return '';
    }

    if ($setting->$value == null){
        return '';
    }

    return $setting->$value;
}

function settingDate($key): string
{
    $setting = Setting::query()->where('key', $key)->first();
    if (!$setting) {
        return '';
    }
    return Carbon::make($setting->date)->format('Y/m/d');
}

function settingImage($key): string
{
    $setting = Setting::query()->where('key', $key)->with('media')->first();

    if (empty($setting)) {
        return '';
    }

    if ($setting && $setting->image == null) {
        return '';
    }
    return $setting->image->getUrl();
}

function settingMultiple($key)
{
    $setting = Setting::query()->where('key', $key)->with('media')->first();

    if (empty($setting)) {
        return '';
    }

    return $setting->multi_image;
}

function settingFile($key): string
{
    $file = Setting::query()->where('key', $key)->with('media')->first();

    if ($file == null) {
        return '';
    }

    if ($file->file == null) {
        return '';
    }

    return $file->file->getUrl();
}

function siteLanguages(): array
{
    $langs = SiteLanguage::orderBy('id', 'asc')->pluck('locale')->toArray();

    if (count($langs) == 0) {
        return config('translatable.locales');
    }

    return $langs;
}

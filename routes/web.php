<?php

use App\Http\Controllers\Pages\AboutPageController;
use App\Http\Controllers\Pages\HomePageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('', [HomePageController::class, 'index'])->name('home');
    Route::get('about-roadstone', [AboutPageController::class, 'index'])->name('about');

});

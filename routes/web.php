<?php

use App\Http\Controllers\Pages\AboutPageController;
use App\Http\Controllers\Pages\BlogPageController;
use App\Http\Controllers\Pages\ContactPageController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\NewsStoreController;
use App\Http\Controllers\Pages\TirePageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::view('', 'welcome');

    Route::get('home-page', [HomePageController::class, 'index'])->name('home');
    Route::get('about-roadstone', [AboutPageController::class, 'index'])->name('about');

    // Tires route
    Route::get('tires', [TirePageController::class, 'index'])->name('tires');
    Route::get('tires/{carType:slug}/type', [TirePageController::class, 'typePage'])->name('tires.type');
    Route::get('tires/{tire:slug}/details', [TirePageController::class, 'show'])->name('tires.show');

    // Blogs Route
    Route::get('guide-blogs', [BlogPageController::class, 'index'])->name('blogs');
    Route::get('guide-blogs/{article:slug}/details', [BlogPageController::class, 'show'])->name('blogs.show');

    // Contact Route
    Route::get('contact-us', [ContactPageController::class, 'index'])->name('contact');
    Route::post('contact-us/send', [ContactPageController::class, 'store'])->name('contact.store');

    // News Route
    Route::post('news/send', [NewsStoreController::class, 'store'])->name('news.store');

});

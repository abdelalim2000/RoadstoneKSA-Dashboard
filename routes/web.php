<?php

use Illuminate\Support\Facades\Route;

Route::get('{any}', function () {
    return view('coming-soon-page');
})->where('any', '.*');

//Route::group(
//    [
//        'prefix' => LaravelLocalization::setLocale(),
//        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//    ], function () {
//
//
//    Route::get('', [HomePageController::class, 'index'])->name('home');
//    Route::get('about-roadstone', [AboutPageController::class, 'index'])->name('about');
//
//    // Tires route
//    Route::get('tires', [TirePageController::class, 'index'])->name('tires');
//    Route::get('tires/{carType:slug}/type', [TirePageController::class, 'typePage'])->name('tires.type');
//    Route::get('tires/{tire:slug}/details', [TirePageController::class, 'show'])->name('tires.show');
//
//    // Blogs Route
//    Route::get('guide-blogs', [BlogPageController::class, 'index'])->name('blogs');
//    Route::get('guide-blogs/{article:slug}/details', [BlogPageController::class, 'show'])->name('blogs.show');
//
//    // Contact Route
//    Route::get('contact-us', [ContactPageController::class, 'index'])->name('contact');
//    Route::post('contact-us/send', [ContactPageController::class, 'store'])->name('contact.store');
//
//    // News Route
//    Route::post('news/send', [NewsStoreController::class, 'store'])->name('news.store');
//
//    // Retialers Route
//    Route::get('retailers', [RetailerPageController::class, 'index'])->name('retailer');
//
//    // Search Routes
//    Route::get('search/tires/maker', [SearchTires::class, 'searchByMaker'])->name('search.maker');
//    Route::get('search/tires/size', [SearchTires::class, 'searchBysize'])->name('search.size');
//
//    // Terms and privacy routes
//    Route::get('terms-condition', function () {
//        return view('site.term-page');
//    })->name('terms');
//
//    Route::get('privacy-policy', function () {
//        return view('site.privacy-page');
//    })->name('privacy');
//
//});

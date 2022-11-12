<?php

use App\Http\Controllers\Api\ArticleModuleApi\ArticleApiController;
use App\Http\Controllers\Api\CarsModuleApi\CarApiController;
use App\Http\Controllers\Api\ContactModuleApi\ContactApiController;
use App\Http\Controllers\Api\NewsModuleApi\NewsApiController;
use App\Http\Controllers\Api\RetailsModuleApi\RetailsApiController;
use App\Http\Controllers\Api\TiresModuleApi\TiresApiController;
use Illuminate\Support\Facades\Route;


Route::controller(CarApiController::class)
    ->prefix('cars')
    ->group(function () {

        Route::get('makers', 'maker')->name('api.get-maker');

    });

Route::controller(ArticleApiController::class)
    ->group(function () {

        Route::get('articles', 'index')->name('api.get-article');
        Route::get('articles/{article:slug}/detail', 'show')->name('api.get-show');

    });

Route::controller(ContactApiController::class)
    ->group(function () {

        Route::get('contact-types', 'index')->name('api.get-contact-type');
        Route::post('send-message', 'store')->name('api.store-new-contact');

    });

Route::controller(NewsApiController::class)
    ->group(function () {

        Route::post('news-letter', 'store')->name('api.store-new-contact');

    });


Route::controller(TiresApiController::class)->prefix('tires')->group(function () {
    Route::get('/', 'index')->name('api.get-tires');
    Route::get('/{carType:slug}/type', 'typePage')->name('api.get-tires.type');
    Route::get('/{tire:slug}/details', 'show')->name('api.tires.show');
});

Route::controller(RetailsApiController::class)->prefix('retails')->group(function () {
    Route::get('/', [RetailsApiController::class, 'index'])->name('retailer');
});
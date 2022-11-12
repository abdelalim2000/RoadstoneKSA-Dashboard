<?php

use App\Http\Controllers\Api\ArticleModuleApi\ArticleApiController;
use App\Http\Controllers\Api\CarsModuleApi\CarApiController;
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

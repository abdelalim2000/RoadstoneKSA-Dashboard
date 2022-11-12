<?php

use App\Http\Controllers\Api\CarsModuleApi\CarApiController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::controller(CarApiController::class)
    ->prefix('cars')
    ->group(function () {

        Route::get('makers', 'maker')->name('api.get-maker');

    });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


});

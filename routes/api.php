<?php

use App\Http\Controllers\Api\TireSearchApiController;
use Illuminate\Support\Facades\Route;

Route::post('makers', [TireSearchApiController::class, 'maker'])->name('api.get-maker');
Route::post('models', [TireSearchApiController::class, 'model'])->name('api.get-model');

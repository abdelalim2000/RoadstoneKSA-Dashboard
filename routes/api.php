<?php

use App\Http\Controllers\Api\TireSearchApiController;
use Illuminate\Support\Facades\Route;

Route::post('makers', [TireSearchApiController::class, 'maker'])->name('api.get-maker');
Route::post('models', [TireSearchApiController::class, 'model'])->name('api.get-model');
Route::post('width', [TireSearchApiController::class, 'width'])->name('api.get-width');
Route::post('aspect-ratio', [TireSearchApiController::class, 'aspectRatio'])->name('api.get-aspect-ratio');
Route::post('rim-diameter', [TireSearchApiController::class, 'rimDiameter'])->name('api.get-rim-diameter');

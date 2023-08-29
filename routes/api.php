<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\LivianoController;
use App\Http\Controllers\VehiculoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('colores', ColorController::class);
Route::apiResource('livianos', LivianoController::class);
Route::apiResource('vehiculos', VehiculoController::class)
    ->only(['index','store'])
    ->middleware('throttle:10,1');
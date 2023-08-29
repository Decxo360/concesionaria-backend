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

//Rutas por defecto creados por los controladores de cada recurso, en este caso cuenta con 4 metodos GET, POST, DELETE, PUT/PATCH
//only -> indica que métodos serán intermediados por un middleware
//Tiene un middleware llamado Throttle el cual te permite realizar 10 peticiones cómo máximo en un minuto
Route::apiResource('vehiculos', VehiculoController::class)
    ->only(['index','store'])
    ->middleware('throttle:10,1');
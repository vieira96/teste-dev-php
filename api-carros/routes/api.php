<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/carros', [CarsController::class, 'getAllCars']);
Route::post('/carros', [CarsController::class, 'createCar']);
Route::get('/carros/{id}', [CarsController::class, 'getCarById']);
Route::put('/carros/{id}', [CarsController::class, 'updateCar']);
Route::delete('/carros/{id}', [CarsController::class, 'deleteCar']);




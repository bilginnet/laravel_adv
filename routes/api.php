<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(\App\Http\Controllers\Api\AdvertisingController::class)
        ->prefix('advertising')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
        });
});



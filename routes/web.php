<?php

use App\Http\Controllers\Web\AdvertisingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('advertising.index');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AdvertisingController::class)
        ->prefix('advertising')
        ->group(function () {
            Route::get('/', 'index')->name('advertising.index');
            Route::get('/create', 'create')->name('advertising.create');
            Route::post('/', 'store')->name('advertising.store');
        });
});


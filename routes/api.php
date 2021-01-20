<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AppUserController;
use App\Http\Controllers\API\DeviceController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('appusers', [AppUserController::class, 'index']);
Route::group(['prefix' => 'appuser'], function () {
    Route::post('add', [AppUserController::class, 'add']);
    Route::get('edit/{id}', [AppUserController::class, 'edit']);
    Route::post('update/{id}', [AppUserController::class, 'update']);
    Route::delete('delete/{id}', [AppUserController::class, 'delete']);
});

Route::get('devices', [DeviceController::class, 'index']);
Route::group(['prefix' => 'device'], function () {
    Route::post('add', [DeviceController::class, 'add']);
    Route::get('edit/{id}', [DeviceController::class, 'edit']);
    Route::post('update/{id}', [DeviceController::class, 'update']);
    Route::delete('delete/{id}', [DeviceController::class, 'delete']);
});
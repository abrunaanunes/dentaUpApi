<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DentistController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout']);
    Route::post('register', [UserController::class, 'store']);
});


Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'protected'
], function() {
    Route::apiResource('client', ClientController::class);
    Route::apiResource('dentist', DentistController::class);
    Route::apiResource('user', UserController::class);
    Route::apiResource('appointment', AppointmentController::class);
});

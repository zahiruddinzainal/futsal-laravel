<?php

namespace App\Http\Controllers;
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

Route::get('/login/{email}/{password}', [LoginController::class, 'appLogin']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/courts', [BookingController::class, 'courts']);
Route::get('/courts/{date}', [BookingController::class, 'courtsDate']);
Route::get('/courts/{court}/name/{name}/date/{date}/time/{time}', [BookingController::class, 'appBookCourt']);

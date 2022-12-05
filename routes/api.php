<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Api;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('temperature/{id}', [Api::class, 'getTemperature']);
Route::get('humidity/{id}', [Api::class, 'getHumidity']);
Route::get('barometricpressure/{id}', [Api::class, 'getBarometricPressure']);
Route::get('precipitation/{id}', [Api::class, 'getPrecipitation']);
Route::get('soilhumidity/{id}', [Api::class, 'getSoilHumidity']);
Route::get('soiltemperature/{id}', [Api::class, 'getSoilTemperature']);
Route::get('sunlightuvi/{id}', [Api::class, 'getSunLightUVI']);
Route::get('winddirection/{id}', [Api::class, 'getWindDirection']);
Route::get('windspeed/{id}', [Api::class, 'getWindSpeed']);
Route::get('stations', [Api::class, 'getStation']);





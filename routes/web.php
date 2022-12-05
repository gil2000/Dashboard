<?php

use App\Http\Controllers\User\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutdoorTemperatureController;
use App\Http\Controllers\WindDirectionController;
use App\Http\Controllers\OutdoorHumidityController;
use App\Http\Controllers\PrecipitationController;
use App\Http\Controllers\BarometricPressureController;
use App\Http\Controllers\SoilHumidityController;
use App\Http\Controllers\SoilTemperatureController;
use App\Http\Controllers\SunLightVisibleController;
use App\Http\Controllers\SunLightUVIndexController;
use App\Http\Controllers\WindSpeedController;

/*
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $stations = \App\Models\Station::all();
    return view('index')->with(['stations' => $stations]);
});

//Route::resource('/admin/users', UserController::class);

Route::prefix('user')->middleware('auth', 'verified')->name('user.')->group(function (){
    Route::get('profile', Profile::class)->name('profile');
});

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function (){
   Route::resource('/users', UserController::class);
});

Route::get('dashboard/{id}', [DashboardController::class, 'index'])->name('dashboard');
Route::get('TemperatureDashboard', [DashboardController::class, 'index'])->name('temperatureDashboard');


Route::get('outdoortemperature', [OutdoorTemperatureController::class, 'index'])->name('outdoortemperature');
Route::get('winddirection', [WindDirectionController::class, 'index'])->name('winddirection');
Route::get('outdoorhumidity', [OutdoorHumidityController::class, 'index'])->name('outdoorhumidity');
Route::get('precipitation', [PrecipitationController::class, 'index'])->name('precipitation');
Route::get('soilhumidity', [SoilHumidityController::class, 'index'])->name('soilhumidity');
Route::get('barometricpressure', [BarometricPressureController::class, 'index'])->name('barometricpressure');
Route::get('soiltemperature', [SoilTemperatureController::class, 'index'])->name('soiltemperature');
Route::get('sunlightvisible', [SunLightVisibleController::class, 'index'])->name('sunlightvisible');
Route::get('sunlightuvindex', [SunLightUVIndexController::class, 'index'])->name('sunlightuvindex');
Route::get('windspeed', [WindSpeedController::class, 'index'])->name('windspeed');



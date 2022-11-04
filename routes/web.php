<?php

use App\Http\Controllers\User\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\OutdoorTemperature;


/*
|--------------------------------------------------------------------------
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

Route::get('dashboard/{id}', [Dashboard::class, 'index'])->name('dashboard');
Route::get('TemperatureDashboard', [Dashboard::class, 'index'])->name('temperatureDashboard');


Route::get('outdoortemperature', [OutdoorTemperature::class, 'index'])->name('outdoortemperature');

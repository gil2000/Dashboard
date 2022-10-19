<?php

use App\Http\Controllers\User\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dashboard;

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
    return view('index');
});

//Route::resource('/admin/users', UserController::class);

Route::prefix('user')->middleware('auth', 'verified')->name('user.')->group(function (){
    Route::get('profile', Profile::class)->name('profile');
});

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'verified'])->name('admin.')->group(function (){
   Route::resource('/users', UserController::class);
});

Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::get('TemperatureDashboard', [Dashboard::class, 'index'])->name('temperatureDashboard');

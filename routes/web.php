<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});



Route::get('/login', [AuthController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('register', RegisterController::class);



Route::prefix('cms')
    ->middleware('auth')
    ->name('cms.')
    ->group(function () {
        Route::resource('/home', HomeController::class);
        Route::resource('user', UserController::class)->middleware('access.user');
        Route::resource('admin', AdminController::class)->middleware('access.admin');
    });

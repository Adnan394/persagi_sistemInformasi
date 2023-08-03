<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

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
    return view('admin.dashboard');
});

Route::resource('/register', RegisterController::class);
Route::resource('/login', LoginController::class);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('anggota', function () {
    return view('anggota.dashboard');
});
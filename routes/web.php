<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
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
Route::prefix('/admin')->middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('artikel', ArtikelController::class);
});

Route::resource('/register', RegisterController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('anggota', function () {
    return view('anggota.dashboard');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\akunAnggotaController;
use App\Http\Controllers\daftarAnggotaController;
use App\Http\Controllers\auth\ChangePasswordController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\UserAnggotaController;
use App\Http\Controllers\EventController;

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

Route::get('/', [LoginController::class, 'index'])->name('login'); // Mengarahkan ke halaman login
Route::prefix('/admin')->middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('artikel', ArtikelController::class);
    Route::resource('akunAnggota', AkunAnggotaController::class);
    Route::resource('daftarAnggota', DaftarAnggotaController::class);
    Route::resource('konsultasi', KonsultasiController::class);
    Route::resource('event', EventController::class);    
    // Route::resource('changePassword', ChangePasswordController::class);
});
Route::resource('userAnggota', UserAnggotaController::class);

Route::resource('/register', RegisterController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::put('/changePassword', [LoginController::class, 'change'])->name('login.change');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('anggota', function () {
    return view('anggota.dashboard');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KolokiumController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UjianSarjanaController;
use App\Http\Controllers\NaskahSkripsiController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'cekrole:admin'], function () {
        Route::resource('/prodi', ProdiController::class);
        Route::resource('/dosen', DosenController::class);
        Route::resource('/jadwal', JadwalController::class);
        Route::resource('/ruangan', RuanganController::class);
    });

    Route::group(['middleware', 'cekrole: dosen, mahasiswa'], function () {
        Route::resource('/sempro', ProposalController::class);
        Route::resource('/skripsi', NaskahSkripsiController::class);
        Route::resource('/ujiansarjana', UjianSarjanaController::class);
        Route::resource('/kolokium', KolokiumController::class);
    });
});

require __DIR__.'/auth.php';

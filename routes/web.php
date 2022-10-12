<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternalJudulController;
use App\Http\Controllers\InternalProseduralController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelayakanDataController;
use App\Http\Controllers\KemajuanPenelitianController;
use App\Http\Controllers\MetodePenelitianController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\NaskahSkripsiController;
use App\Http\Controllers\PembimbinganNaskahController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SidangNaskahSkripsiController;
use App\Http\Controllers\TinjauanPustakaController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'cekRole:admin'], function () {
        Route::resource('/prodi', ProdiController::class);
        Route::resource('/dosen', DosenController::class);
        Route::resource('/sesi', SesiController::class);
        Route::resource('/jadwal', JadwalController::class);
        Route::resource('/ruangan', RuanganController::class);
    });

    Route::group(['middleware', 'cekRole:dosen,mahasiswa'], function () {
        Route::resource('/internal-judul', InternalJudulController::class);
        Route::resource('/metode-penelitian', MetodePenelitianController::class);
        Route::resource('/tinjauan-pustaka', TinjauanPustakaController::class);
        Route::resource('/pembimbingan-naskah', PembimbinganNaskahController::class);
        Route::resource('/internal-prosedural', InternalProseduralController::class);
        Route::resource('/kemajuan-penelitian', KemajuanPenelitianController::class);
        Route::resource('/kelayakan-data', KelayakanDataController::class);
        Route::resource('/sidangnaskah-skripsi', SidangNaskahSkripsiController::class);
        Route::resource('/ujiannaskah-skripsi', NaskahSkripsiController::class);
    });
    Route::group(['middleware', 'cekRole:dosen'], function (){
        Route::get('/status-internal-judul/{id}/edit', [InternalJudulController::class, 'editDosen'])->name('statusinternal.edit');
        Route::put('/status-internal-judul/{id}', [InternalJudulController::class, 'updateDosen'])->name('statusinternal.update');
    });

    Route::post('/sertifikat-interjudul', [InternalJudulController::class, 'sertifikat'])->name('sertifikat.interjudul');
});

require __DIR__.'/auth.php';

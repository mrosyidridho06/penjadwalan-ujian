<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternalJudulController;
use App\Http\Controllers\KelayakanDataController;
use App\Http\Controllers\NaskahSkripsiController;
use App\Http\Controllers\TinjauanPustakaController;
use App\Http\Controllers\MetodePenelitianController;
use App\Http\Controllers\InternalProseduralController;
use App\Http\Controllers\KemajuanPenelitianController;
use App\Http\Controllers\PembimbinganNaskahController;
use App\Http\Controllers\SidangNaskahSkripsiController;

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

// Route::get('/tes', function(){
//     return view('home1');
// });

Route::group(['middleware' => ['auth','cekRole:mahasiswa,dosen,admin']], function () {
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

Route::group(['middleware' => ['auth', 'cekRole:admin']], function () {
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/dosen', DosenController::class);
    Route::resource('/sesi', SesiController::class);
    Route::resource('/jadwal', JadwalController::class);
    Route::resource('/ruangan', RuanganController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/sertifikat-interjudul', [InternalJudulController::class, 'sertifikat'])->name('sertifikat.interjudul');
    Route::post('/ba-metpen', [MetodePenelitianController::class, 'berita'])->name('ba.metpen');
    Route::post('/ba-tipus', [TinjauanPustakaController::class, 'berita'])->name('ba.tipus');
    Route::post('/ba-pn', [PembimbinganNaskahController::class, 'berita'])->name('ba.pn');
    Route::post('/ba-internalprosedural', [InternalProseduralController::class, 'berita'])->name('ba.prosedural');
    Route::post('/ba-kemajuan', [KemajuanPenelitianController::class, 'berita'])->name('ba.kemajuan');
    Route::post('/ba-kelayakan', [KelayakanDataController::class, 'berita'])->name('ba.kelayakan');
    Route::post('/ba-sidangnaskah', [SidangNaskahSkripsiController::class, 'berita'])->name('ba.sidangnaskah');
    Route::post('/undangan-uns', [NaskahSkripsiController::class, 'undangan'])->name('undangan.uns');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profile', ProfileController::class);

});

require __DIR__.'/auth.php';

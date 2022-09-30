<?php

use App\Http\Controllers\KolokiumController;
use App\Http\Controllers\NaskahSkripsiController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UjianSarjanaController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/prodi', ProdiController::class);
    Route::resource('/sempro', ProposalController::class);
    Route::resource('/skripsi', NaskahSkripsiController::class);
    Route::resource('/ujiansarjana', UjianSarjanaController::class);
    Route::resource('/kolokium', KolokiumController::class);
});

require __DIR__.'/auth.php';

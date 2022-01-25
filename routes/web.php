<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GambarController;

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
    return view('beranda');
});

Route::resource('pegawai', PegawaiController::class);
Route::get('pegawai/{pegawai}', [PegawaiController::class,'delete']);
Route::get('cetakPegawai', [PegawaiController::class,'cetakPegawai'])->name('cetakPegawai');
Route::get('cetakTanggal', [PegawaiController::class,'cetakTanggal'])->name('cetakTanggal');
Route::get('cetakPegawaiTanggal/{tglAwal}/{tglAkhir}', [PegawaiController::class,'cetakPegawaiTanggal'])->name('cetakPegawaiTanggal');

Route::resource('gambar',GambarController::class);
Route::get('gambar/{gambar}', [GambarController::class,'delete']);

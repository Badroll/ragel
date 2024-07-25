<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'dashboard'])->middleware('validate');

Route::get('auth/login', [AuthController::class, 'login']);
Route::post('auth/login', [AuthController::class, 'doLogin']);
Route::prefix('auth')->middleware('validate')->group(function () {
    //Route::get('/', [AuthController::class, 'index']);
    Route::get('profil', [AuthController::class, 'profil']);
    Route::post('update', [AuthController::class, 'update']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::prefix('kontak')->middleware('validate')->group(function () {
    Route::get('/', [KontakController::class, 'index']);
    Route::post('create', [KontakController::class, 'create']);
    Route::get('form', [KontakController::class, 'form']);
    Route::get('riwayat', [KontakController::class, 'riwayat']);
    Route::put('update', [KontakController::class, 'update']);
    Route::delete('delete', [KontakController::class, 'delete']);
});

Route::prefix('kategori')->middleware('validate')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('create', [KategoriController::class, 'create']);
    Route::get('form', [KategoriController::class, 'form']);
    Route::put('update', [KategoriController::class, 'update']);
    Route::delete('delete', [KategoriController::class, 'delete']);
});

Route::prefix('barang')->middleware('validate')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('create', [BarangController::class, 'create']);
    Route::get('form', [BarangController::class, 'form']);
    Route::put('update', [BarangController::class, 'update']);
    Route::delete('delete', [BarangController::class, 'delete']);
});

Route::prefix('transaksi')->middleware('validate')->group(function () {
    Route::get('/', [TransaksiController::class, 'index']);
    Route::post('create', [TransaksiController::class, 'create']);
    Route::get('form', [TransaksiController::class, 'form']);
    Route::put('update', [TransaksiController::class, 'update']);
    Route::delete('delete', [TransaksiController::class, 'delete']);

    Route::get('laporan', [TransaksiController::class, 'laporan']);
});

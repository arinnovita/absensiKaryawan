<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KeteranganController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::post('/karyawan/{id}/update', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::get('/karyawan/{id}/destroy', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
    
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::post('/jabatan/{id}/update', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::get('/jabatan/{id}/destroy', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
    
    Route::get('/keterangan', [KeteranganController::class, 'index'])->name('keterangan.index');
    Route::post('/keterangan/store', [KeteranganController::class, 'store'])->name('keterangan.store');
    Route::post('/keterangan/{id}/update', [KeteranganController::class, 'update'])->name('keterangan.update');
    Route::get('/keterangan/{id}/destroy', [KeteranganController::class, 'destroy'])->name('keterangan.destroy');
    
    Route::get('/absen', [AbsenController::class, 'index'])->name('absen.index');
    Route::post('/absen/store', [AbsenController::class, 'store'])->name('absen.store');
});

require __DIR__.'/auth.php';

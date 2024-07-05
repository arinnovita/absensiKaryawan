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

Route::get('/', [HomeController::class, 'index']);

Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::post('/karyawan/{id}/update', [KaryawanController::class, 'update']);
Route::get('/karyawan/{id}/destroy', [KaryawanController::class, 'destroy']);

Route::get('/jabatan', [JabatanController::class, 'index']);
Route::post('/jabatan/store', [JabatanController::class, 'store']);
Route::post('/jabatan/{id}/update', [JabatanController::class, 'update']);
Route::get('/jabatan/{id}/destroy', [JabatanController::class, 'destroy']);

Route::get('/keterangan', [KeteranganController::class, 'index']);
Route::post('/keterangan/store', [KeteranganController::class, 'store']);
Route::post('/keterangan/{id}/update', [KeteranganController::class, 'update']);
Route::get('/keterangan/{id}/destroy', [KeteranganController::class, 'destroy']);

Route::get('/absen', [AbsenController::class, 'index']);
Route::post('/absen/store', [AbsenController::class, 'store']);
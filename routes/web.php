<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PetaLokasiController;
use App\Http\Controllers\MonitoringAlsintanController;

//auth
Route::get('/login', [AuthController::class, 'showlogin']) ->name('login');


//beranda
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

//peta-lokasi
Route::get('/index-peta-lokasi', [PetaLokasiController::class, 'index'])->name('index.peta.lokasi');
Route::get('/peta-lokasi-alsintan', [PetaLokasiController::class, 'lokasiAlsintan'])->name('peta.lokasi.alsintan');

//monitoring aktivitas
Route::get('/monitoring-alsintan', [MonitoringAlsintanController::class, 'index'])->name('monitoring.aktivitas');

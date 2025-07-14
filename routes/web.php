<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetaLokasiController;
use App\Http\Controllers\DataAlsintanController;
use App\Http\Controllers\ServiceHistoryController;
use App\Http\Controllers\MonitoringAlsintanController;

//auth
Route::get('/', function () {
  return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
  //beranda
  Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

  //peta-lokasi
  Route::get('/index-peta-lokasi', [PetaLokasiController::class, 'index'])->name('index.peta.lokasi');
  Route::get('/peta-lokasi-alsintan', [PetaLokasiController::class, 'lokasiAlsintan'])->name('peta.lokasi.alsintan');

  //monitoring aktivitas
  Route::get('/monitoring-alsintan', [MonitoringAlsintanController::class, 'index'])->name('monitoring.aktivitas');

  // data_alsintan
  Route::get('/data-alsintan', [DataAlsintanController::class, 'index'])->name('index_alsintan');
  Route::get('/create-alsintan', [DataAlsintanController::class, 'create'])->name('create_alsintan');
  Route::post('/alsintan/store', [DataAlsintanController::class, 'store'])->name('dataalsintan.store');
  Route::get('/alsintan/show/{id}', [DataAlsintanController::class, 'show'])->name('alsintan.show');
  Route::delete('/alsintan/{id}', [DataAlsintanController::class, 'destroy'])->name('alsintan.destroy');

  //dashboard 
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  //gps data 

  //service history 
  Route::get('/alsintan/{id}/service-history/create', [ServiceHistoryController::class, 'create'])->name('service.create');
  Route::post('/service-history/store', [ServiceHistoryController::class, 'store'])->name('service.store');
  Route::get('/service-history/{id}/edit', [ServiceHistoryController::class, 'edit'])->name('service.edit');
  Route::delete('/service-history/{id}', [ServiceHistoryController::class, 'destroy'])->name('service.destroy');
});

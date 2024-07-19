<?php
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\CreatePasienController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\DataPerawatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\KecamatanController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ROUTE LOGIN
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);


Route::get('/get-cities-by-province/{provinceId}', [ProvinceController::class, 'getCitiesByProvince']);
Route::get('/get-kecamatan-by-city/{cityId}', [CityController::class, 'getKecamatanByCity']);
Route::get('/get-kelurahan-by-kecamatan/{kecamatanId}', [KecamatanController::class, 'getKelurahanByKecamatan']);

Route::get('/dashboard',[RawatJalanController::class,'store'])->name('rawat-jalan');

// ROUTE MASTER PASIEN
Route::get('/dashboard/pendaftaran',[RawatJalanController::class,'store'])->name('rawat-jalan');
Route::get('/dashboard/pendaftaran/create-pasien',[CreatePasienController::class,'createPasien'])->name('create-pasien');
Route::post('/dashboard/pendaftaran/create-pasien',[CreatePasienController::class,'createData'])->name('create-pasien');
Route::get('/dashboard/pendaftaran/edit/{id}',[CreatePasienController::class,'edit'])->name('edit-pasien');
Route::put('/dashboard/pendaftaran/{id}',[CreatePasienController::class,'update'])->name('update-pasien');
Route::delete('/dashboard/pendaftaran/{id}',[CreatePasienController::class,'destroy'])->name('destroy-pasien');

// ROUTE MASTER PERAWAT
Route::get('/dashboard/perawat/create-perawat',[PerawatController::class,'store'])->name('create-perawat');
Route::post('/dashboard/perawat/create-perawat',[PerawatController::class,'create'])->name('create-perawat');
Route::get('/dashboard/perawat/data-perawat',[DataPerawatController::class,'store'])->name('data-perawat');
Route::get('/dashboard/perawat/edit/{id}',[DataPerawatController::class,'edit'])->name('edit-perawat');
Route::put('/dashboard/perawat/{id}',[DataPerawatController::class,'update'])->name('update-perawat');
Route::delete('/dashboard/perawat/{id}',[DataPerawatController::class,'destroy'])->name('destroy-perawat');

// ROUTE MASTER TENAGA MEDIS
Route::get('/tenaga-medis/create-tenaga-medis',[DokterController::class,'store'])->name('create-dokter');
Route::get('/tenaga-medis/data-tenaga-medis',[DokterController::class,'storeData'])->name('create-dokter');
Route::post('/tenaga-medis/create-tenaga-medis',[DokterController::class,'create'])->name('create-dokter');
Route::get('/tenaga-medis/edit-tenaga-medis/{id}',[DokterController::class,'edit'])->name('edit-dokter');
Route::put('/tenaga-medis/{id}',[DokterController::class,'update'])->name('update-dokter');
Route::delete('/tenaga-medis/{id}',[DokterController::class,'destroy'])->name('delete-dokter');
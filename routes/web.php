<?php
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\CreatePasienController;
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
Route::get('/get-cities-by-province/{provinceId}', [ProvinceController::class, 'getCitiesByProvince']);
Route::get('/get-kecamatan-by-city/{cityId}', [CityController::class, 'getKecamatanByCity']);
Route::get('/get-kelurahan-by-kecamatan/{kecamatanId}', [KecamatanController::class, 'getKelurahanByKecamatan']);


Route::get('/dashboard/pendaftaran',[RawatJalanController::class,'store'])->name('rawat-jalan');
Route::get('/dashboard/pendaftaran/create-pasien',[CreatePasienController::class,'createPasien'])->name('create-pasien');
Route::post('/dashboard/pendaftaran/create-pasien',[CreatePasienController::class,'createData'])->name('create-pasien');
Route::get('/dashboard/pendaftaran/edit/{id}',[CreatePasienController::class,'edit'])->name('edit-pasien');
Route::put('/dashboard/pendaftaran/{id}',[CreatePasienController::class,'update'])->name('update-pasien');
Route::delete('/dashboard/pendaftaran/{id}',[CreatePasienController::class,'destroy'])->name('destroy-pasien');

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/admin/user',[AdminController::class,'user'])->name('user');
Route::post('/admin/user',[AdminController::class,'create'])->name('create_user');
Route::get('/admin/user/{id}/edit',[AdminController::class,'edit'])->name('edit-user');
Route::put('/admin/user/{id}',[AdminController::class,'update'])->name('edit-user');
Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('del-user');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
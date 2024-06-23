<?php
use App\Http\Controllers\RawatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
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
Route::get('/dashboard/rawat-jalan',[RawatController::class,'store'])->name('rawat-jalan');
Route::get('/dashboard/rawat-jalan/create-pasien',[RawatController::class,'createPasien'])->name('rawat-jalan');

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/admin/user',[AdminController::class,'user'])->name('user');
Route::post('/admin/user',[AdminController::class,'create'])->name('create_user');
Route::get('/admin/user/{id}/edit',[AdminController::class,'edit'])->name('edit-user');
Route::put('/admin/user/{id}',[AdminController::class,'update'])->name('edit-user');
Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('del-user');

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
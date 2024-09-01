<?php
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\DataPerawatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ScheduleDokterController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TarifRadiologiController;
use App\Http\Controllers\TarifLabController;
use App\Http\Controllers\TipeJaminanController;
use App\Http\Controllers\JaminanController;
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

// DASHBOARDx
Route::get('/',[DashboardController::class,'indexDashboard'])->name('dashboard');

// ROUTE MASTER PASIEN
Route::get('/pasien/data-pasien',[PasienController::class,'indexDataPasien'])->name('data-pasien');
Route::get('/pasien/create-pasien',[PasienController::class,'indexCreatePasien'])->name('create-pasien');
Route::post('/pasien/create-pasien',[PasienController::class,'storePasien'])->name('store-pasien');
Route::get('/pasien/edit-pasien/{id}',[PasienController::class,'edit'])->name('edit-pasien');
Route::put('/pasien/update-pasien/{id}',[PasienController::class,'update'])->name('update-pasien');
Route::delete('/pasien/delete-pasien/{id}',[PasienController::class,'destroy'])->name('destroy-pasien');

// ROUTE MASTER PERAWAT
Route::get('/perawat/create-perawat',[PerawatController::class,'store'])->name('create-perawat');
Route::post('/perawat/create-perawat',[PerawatController::class,'create'])->name('create-perawat');
Route::get('/perawat/data-perawat',[DataPerawatController::class,'store'])->name('data-perawat');
Route::get('/perawat/edit/{id}',[DataPerawatController::class,'edit'])->name('edit-perawat');
Route::put('/perawat/{id}',[DataPerawatController::class,'update'])->name('update-perawat');
Route::delete('/perawat/{id}',[DataPerawatController::class,'destroy'])->name('destroy-perawat');

// ROUTE MASTER TENAGA MEDIS
Route::get('/tenaga-medis/create-tenaga-medis',[DokterController::class,'store'])->name('store-dokter');
Route::get('/tenaga-medis/data-tenaga-medis',[DokterController::class,'storeData'])->name('data-dokter');
Route::post('/tenaga-medis/create-tenaga-medis',[DokterController::class,'create'])->name('create-dokter');
Route::get('/tenaga-medis/edit-tenaga-medis/{id}',[DokterController::class,'edit'])->name('edit-dokter');
Route::put('/tenaga-medis/{id}',[DokterController::class,'update'])->name('update-dokter');
Route::delete('/tenaga-medis/{id}',[DokterController::class,'destroy'])->name('delete-dokter');

Route::get('/tenaga-medis/jadwal-dokter',[ScheduleDokterController::class,'store'])->name('penjadwalan-dokter');
Route::get('/tenaga-medis/create-jadwal-dokter',[ScheduleDokterController::class,'storeForm'])->name('create-jadwal-dokter');
Route::post('/tenaga-medis/create-jadwal-dokter',[ScheduleDokterController::class,'create'])->name('create-jadwal-dokter');
Route::get('/tenaga-medis/edit-jadwal-dokter/{id}',[ScheduleDokterController::class,'edit'])->name('edit-jadwal-dokter');
Route::put('/tenaga-medis/update-jadwal-dokter/{id}',[ScheduleDokterController::class,'update'])->name('update-jadwal-dokter');
Route::delete('/tenaga-medis/delete-jadwal-dokter/{id}',[ScheduleDokterController::class,'destroy'])->name('delete-jadwal-dokter');

Route::get('/get-jadwal/{dokter_id}/{layanan_id}', [ScheduleDokterController::class, 'getJadwal']);


// ROUTE MASTER LAYANAN
Route::get('/layanan/create-layanan',[LayananController::class,'store'])->name('create-layanan');
Route::post('/layanan/create-layanan',[LayananController::class,'create'])->name('create-layanan');
Route::get('/layanan/data-layanan',[LayananController::class,'storeData'])->name('data-layanan');
Route::get('/layanan/edit-layanan/{id}',[LayananController::class,'edit'])->name('edit-layanan');
Route::put('/layanan/update-layanan/{id}',[LayananController::class,'update'])->name('update-layanan');
Route::delete('/layanan/delete-layanan/{id}',[LayananController::class,'destroy'])->name('delete-layanan');

// ROUTE MASTER KAMAR
Route::get('/kamar/create-kamar',[KamarController::class,'storeForm'])->name('create-kamar');
Route::post('/kamar/create-kamar',[KamarController::class,'create'])->name('create-kamar');
Route::get('/kamar/data-kamar',[KamarController::class,'storeData'])->name('data-kamar');
Route::get('/kamar/edit-kamar/{id}',[KamarController::class,'edit'])->name('edit-kamar');
Route::put('/kamar/update-kamar/{id}',[KamarController::class,'update'])->name('update-kamar');
Route::delete('/kamar/{id}',[KamarController::class,'destroy'])->name('delete-kamar');

// ROUTE MASTER BED
Route::get('/bed/create-bed',[BedController::class,'storeForm'])->name('create-kamar');
Route::post('/bed/create-bed',[BedController::class,'create'])->name('create-bed');
Route::get('/bed/data-bed',[BedController::class,'storeData'])->name('data-bed');
Route::get('/bed/edit-bed/{id}',[BedController::class,'edit'])->name('edit-bed');
Route::put('/bed/update-bed/{id}',[BedController::class,'update'])->name('update-bed');
Route::delete('/bed/{id}',[BedController::class,'destroy'])->name('delete-bed');

// ROUTE TARIF BED
Route::get('/tarif/create-tarif-kamar',[TarifController::class,'storeForm'])->name('create-tarif-bed');
Route::get('/tarif/data-tarif-kamar',[TarifController::class,'storeData'])->name('data-tarif-bed');
Route::get('/tarif/create-tarif-kamar/{id}',[TarifController::class,'edit'])->name('create-tarif-kamar');
Route::put('/tarif/update-tarif-kamar/{id}',[TarifController::class,'update'])->name('update-tarif-kamar');

Route::get('/tarif/create-group-tarif',[TarifController::class,'indexGroupTarif'])->name('group-tarif');
Route::post('/tarif/create-group-tarif',[TarifController::class,'storeGroupTarif'])->name('create-group-tarif');
Route::get('/tarif/group-tarif',[TarifController::class,'indexDataGroupTarif'])->name('data-group-tarif');
Route::get('/tarif/edit-group-tarif/{id}',[TarifController::class,'editGroupTarif'])->name('edit-group-tarif');
Route::put('/tarif/update-group-tarif/{id}',[TarifController::class,'updateGroupTarif'])->name('update-group-tarif');
Route::delete('/tarif/delete-group-tarif/{id}',[TarifController::class,'destroyGroupTarif'])->name('delete-group-tarif');

Route::get('/tarif/create-group-tarif-tindakan',[TarifController::class,'indexGroupTarifTindakan'])->name('group-tarif-tindakan');
Route::post('/tarif/create-group-tarif-tindakan',[TarifController::class,'storeGroupTarifTindakan'])->name('create-group-tarif-tindakan');
Route::get('/tarif/group-tarif-tindakan',[TarifController::class,'indexDataGroupTarifTindakan'])->name('data-group-tarif-tindakan');
Route::get('/tarif/edit-group-tarif-tindakan/{id}',[TarifController::class,'editGroupTarifTindakan'])->name('edit-group-tarif-tindakan');
Route::put('/tarif/update-group-tarif-tindakan/{id}',[TarifController::class,'updateGroupTarifTindakan'])->name('update-group-tarif-tindakan');
Route::delete('/tarif/delete-group-tarif-tindakan/{id}',[TarifController::class,'destroyGroupTarifTindakan'])->name('delete-group-tarif-tindakan');

Route::get('/tarif/create-tarif-pendaftaran',[TarifController::class,'indexTarifPendaftaran'])->name('tarif-pendaftaran');
Route::post('/tarif/create-tarif-pendaftaran',[TarifController::class,'storeTarifPendaftaran'])->name('create-tarif-pendaftaran');
Route::get('/tarif/data-tarif-pendaftaran',[TarifController::class,'indexDataTarifPendaftaran'])->name('data-tarif-pendaftaran');
Route::get('/tarif/edit-tarif-pendaftaran/{id}',[TarifController::class,'editTarifPendaftaran'])->name('edit-tarif-pendaftaran');
Route::put('/tarif/update-tarif-pendaftaran/{id}',[TarifController::class,'updateTarifPendaftaran'])->name('update-tarif-pendaftaran');
Route::delete('/tarif/delete-tarif-pendaftaran/{id}',[TarifController::class,'destroyTarifPendaftaran'])->name('delete-tarif-pendaftaran');

Route::get('/tarif/create-tarif-tindakan',[TarifController::class,'indexTarifTindakan'])->name('tarif-tindakan');
Route::post('/tarif/create-tarif-tindakan',[TarifController::class,'storeTarifTindakan'])->name('create-tarif-tindakan');
Route::get('/tarif/data-tarif-tindakan',[TarifController::class,'indexDataTarifTindakan'])->name('data-tarif-tindakan');
Route::get('/tarif/edit-tarif-tindakan/{id}',[TarifController::class,'editTarifTindakan'])->name('edit-tarif-tindakan');
Route::put('/tarif/update-tarif-tindakan/{id}',[TarifController::class,'updateTarifTindakan'])->name('update-tarif-tindakan');
Route::delete('/tarif/delete-tarif-tindakan/{id}',[TarifController::class,'destroyTarifTindakan'])->name('delete-tarif-tindakan');

Route::get('/tarif/data-tarif-radiologi',[TarifRadiologiController::class,'indexDataTarifRadiologi'])->name('data-tarif-radiologi');
Route::get('/tarif/create-tarif-radiologi',[TarifRadiologiController::class,'indexTarifRadiologi'])->name('tarif-radiologi');
Route::post('/tarif/create-tarif-radiologi',[TarifRadiologiController::class,'storeTarifRadiologi'])->name('create-tarif-radiologi');
Route::get('/tarif/edit-tarif-radiologi/{id}',[TarifRadiologiController::class,'edit'])->name('edit-tarif-radiologi');
Route::put('/tarif/update-tarif-radiologi/{id}',[TarifRadiologiController::class,'update'])->name('update-tarif-radiologi');
Route::delete('/tarif/delete-tarif-radiologi/{id}',[TarifRadiologiController::class,'destroy'])->name('delete-tarif-radiologi');

Route::get('/tarif/data-tarif-lab',[TarifLabController::class,'indexDataTarifLab'])->name('data-tarif-lab');
Route::get('/tarif/create-tarif-lab',[TarifLabController::class,'indexTarifLab'])->name('tarif-lab');
Route::post('/tarif/create-tarif-lab',[TarifLabController::class,'storeTarifLab'])->name('create-tarif-lab');
Route::get('/tarif/edit-tarif-lab/{id}',[TarifLabController::class,'edit'])->name('edit-tarif-lab');
Route::put('/tarif/update-tarif-lab/{id}',[TarifLabController::class,'update'])->name('update-tarif-lab');
Route::delete('/tarif/delete-tarif-lab/{id}',[TarifLabController::class,'destroy'])->name('delete-tarif-lab');

// ROUTE TIPE JAMINAN
Route::get('/tipe-jaminan/data-tipe-jaminan',[TipeJaminanController::class,'indexDataTipeJaminan'])->name('data-tipe-jaminan');
Route::get('/tipe-jaminan/create-tipe-jaminan',[TipeJaminanController::class,'indexCreateTipeJaminan'])->name('tipe-jaminan');
Route::post('/tipe-jaminan/create-tipe-jaminan',[TipeJaminanController::class,'storeTipeJaminan'])->name('create-tipe-jaminan');
Route::get('/tipe-jaminan/edit-tipe-jaminan/{id}',[TipeJaminanController::class,'edit'])->name('edit-tipe-jaminan');
Route::put('/tipe-jaminan/update-tipe-jaminan/{id}',[TipeJaminanController::class,'update'])->name('update-tipe-jaminan');
Route::delete('/tipe-jaminan/delete-tipe-jaminan/{id}',[TipeJaminanController::class,'destroy'])->name('delete-tipe-jaminan');

// ROUTE JAMINAN
Route::get('/jaminan/data-jaminan',[JaminanController::class,'indexDataJaminan'])->name('data-jaminan');
Route::get('/jaminan/create-jaminan',[JaminanController::class,'indexCreateJaminan'])->name('jaminan');
Route::post('/jaminan/create-jaminan',[JaminanController::class,'storeJaminan'])->name('create-jaminan');
Route::get('/jaminan/edit-jaminan/{id}',[JaminanController::class,'edit'])->name('edit-jaminan');
Route::put('/jaminan/update-jaminan/{id}',[JaminanController::class,'update'])->name('update-jaminan');
Route::delete('/jaminan/delete-jaminan/{id}',[JaminanController::class,'destroy'])->name('delete-jaminan');

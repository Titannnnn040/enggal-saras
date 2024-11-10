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
use App\Http\Controllers\ReservasiPasienController;
use App\Http\Controllers\RegisterPasienController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\SatuanBarangController;
use App\Http\Controllers\FarmakologiController;
use App\Http\Controllers\PabrikController;
use App\Http\Controllers\GolonganObatController;
use App\Http\Controllers\AturanPakaiController;
use App\Http\Controllers\TemplatePoController;
use App\Http\Controllers\TipeHargaJualController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CaraPakaiObatController;
use App\Http\Controllers\BentukSediaanObatController;

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
Route::get('/perawat/create-perawat',[PerawatController::class,'indexCreate'])->name('create-perawat');
Route::post('/perawat/create-perawat',[PerawatController::class,'store'])->name('store-perawat');
Route::get('/perawat/data-perawat',[PerawatController::class,'indexData'])->name('data-perawat');
Route::get('/perawat/edit/{id}',[PerawatController::class,'edit'])->name('edit-perawat');
Route::put('/perawat/{id}',[PerawatController::class,'update'])->name('update-perawat');
Route::delete('/perawat/{id}',[PerawatController::class,'destroy'])->name('destroy-perawat');

// ROUTE MASTER TENAGA MEDIS
Route::get('/tenaga-medis/create-tenaga-medis',[DokterController::class,'indexCreateDokter'])->name('create-dokter');
Route::get('/tenaga-medis/data-tenaga-medis',[DokterController::class,'indexDataDokter'])->name('data-dokter');
Route::post('/tenaga-medis/create-tenaga-medis',[DokterController::class,'create'])->name('store-dokter');
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

// ROUTE RESERVASI PASIEN
Route::get('/pasien/data-reservasi-pasien',[ReservasiPasienController::class,'indexDataReservasi'])->name('data-reservasi');
Route::get('/pasien/create-reservasi-pasien',[ReservasiPasienController::class,'indexCreateReservasi'])->name('create-reservasi');
Route::post('/pasien/create-reservasi-pasien',[ReservasiPasienController::class,'storeReservasi'])->name('reservasi');
Route::get('/pasien/edit-reservasi-pasien/{id}',[ReservasiPasienController::class,'edit'])->name('edit-reservasi');
Route::put('/pasien/update-reservasi-pasien/{id}',[ReservasiPasienController::class,'update'])->name('update-reservasi');
Route::delete('/pasien/delete-reservasi-pasien/{id}',[ReservasiPasienController::class,'destroy'])->name('delete-reservasi');

Route::put('/pasien/update-status-reservasi/{id}',[ReservasiPasienController::class,'updateStatus'])->name('update-status-reservasi');

Route::get('/getPatientData/{noRekamMedis}', [ReservasiPasienController::class, 'getPatientData']);
Route::get('/getDoctorsByLayanan/{layanan_id}', [ReservasiPasienController::class, 'getDoctorsByLayanan']);

// ROUTE RESERVASI PASIEN
Route::get('/pasien/data-regist-pasien',[RegisterPasienController::class,'indexDataRegistPasien'])->name('data-regist-pasien');
Route::get('/pasien/register-pasien/{id}',[RegisterPasienController::class,'indexRegistPasien'])->name('regist-pasien');
Route::post('/pasien/register-pasien/{id}',[RegisterPasienController::class,'store'])->name('store-regist-pasien');
Route::get('/pasien/edit-regist-pasien/{id}',[RegisterPasienController::class,'edit'])->name('edit-regist-pasien');
Route::put('/pasien/update-regist-pasien/{id}',[RegisterPasienController::class,'update'])->name('update-regist-pasien');
Route::delete('/pasien/delete-regist-pasien/{id}',[RegisterPasienController::class,'destroy'])->name('delete-regist-pasien');

// ROUTE RAWAT INAP
Route::get('/pasien/rawat-inap-pasien/{id}',[RawatInapController::class,'indexCreateRawatInap'])->name('create-regist-pasien');
Route::post('/pasien/rawat-inap-pasien/{id}',[RawatInapController::class,'store'])->name('store-regist-pasien');
Route::get('/pasien/data-rawat-inap',[RawatInapController::class,'indexDataRawatInap'])->name('data-regist-pasien');

//ROUTE TINDAKAN RAWAT INAP
Route::get('/pasien/create-tindakan-rawat-inap/{code}',[RawatInapController::class,'indexCreateTindakanRawatInap'])->name('create-tindakan-rawat-inap');
Route::post('/pasien/create-tindakan-rawat-inap/{code}',[RawatInapController::class,'storeTindakan'])->name('store-tindakan-rawat-inap');
Route::get('/pasien/edit-tindakan-rawat-inap/{code}', [RawatInapController::class, 'editTindakan'])->name('edit-tindakan-rawat-inap');
Route::put('/pasien/update-tindakan-rawat-inap/{code}', [RawatInapController::class, 'updateTindakan'])->name('update-tindakan-rawat-inap');
Route::delete('/pasien/delete-tindakan-rawat-inap/{code}', [RawatInapController::class, 'destroyTindakan'])->name('delete-tindakan-rawat-inap');

Route::get('/getTindakanData/{tindakanCode}', [RawatInapController::class, 'getTindakantData']);

//ROUTE SATUAN BARANG
Route::get('/satuan-barang/data-satuan-barang',[SatuanBarangController::class,'indexDataSatuanBarang'])->name('data-satuan-barang');
Route::get('/satuan-barang/create-satuan-barang',[SatuanBarangController::class,'indexCreateSatuanBarang'])->name('create-satuan-barang');
Route::post('/satuan-barang/create-satuan-barang',[SatuanBarangController::class,'store'])->name('store-satuan-barang');
Route::get('/satuan-barang/edit-satuan-barang/{code}', [SatuanBarangController::class, 'edit'])->name('edit-satuan-barang');
Route::put('/satuan-barang/update-satuan-barang/{code}', [SatuanBarangController::class, 'update'])->name('update-satuan-barang');
Route::delete('/satuan-barang/delete-satuan-barang/{code}', [SatuanBarangController::class, 'destroy'])->name('delete-satuan-barang');

//ROUTE FARMAKOLOGI
Route::get('/farmakologi/data-farmakologi',[FarmakologiController::class,'indexDataFarmakologi'])->name('data-farmakologi');
Route::get('/farmakologi/create-farmakologi',[FarmakologiController::class,'indexCreateFarmakologi'])->name('create-farmakologi');
Route::post('/farmakologi/create-farmakologi',[FarmakologiController::class,'store'])->name('store-farmakologi');
Route::get('/farmakologi/edit-farmakologi/{code}',[FarmakologiController::class,'edit'])->name('edit-farmakologi');
Route::put('/farmakologi/edit-farmakologi/{code}',[FarmakologiController::class,'update'])->name('update-farmakologi');
Route::delete('/farmakologi/delete-farmakologi/{code}',[FarmakologiController::class,'destroy'])->name('delete-farmakologi');

//ROUTE PABRIK
Route::get('/pabrik/data-pabrik',[PabrikController::class,'indexDataPabrik'])->name('data-pabrik');
Route::get('/pabrik/create-pabrik',[PabrikController::class,'indexCreatePabrik'])->name('create-pabrik');
Route::post('/pabrik/create-pabrik',[PabrikController::class,'store'])->name('store-pabrik');
Route::get('/pabrik/edit-pabrik/{code}',[PabrikController::class,'edit'])->name('edit-pabrik');
Route::put('/pabrik/edit-pabrik/{code}',[PabrikController::class,'update'])->name('update-pabrik');
Route::delete('/pabrik/delete-pabrik/{code}',[PabrikController::class,'destroy'])->name('delete-pabrik');

// ROUTE GOLONGAN OBAT
Route::get('/obat/data-golongan-obat',[GolonganObatController::class,'indexDataGolonganObat'])->name('data-golongan-obat');
Route::get('/obat/create-golongan-obat',[GolonganObatController::class,'indexCreateGolonganObat'])->name('create-golongan-obat');
Route::post('/obat/create-golongan-obat',[GolonganObatController::class,'store'])->name('store-golongan-obat');
Route::get('/obat/edit-golongan-obat/{code}',[GolonganObatController::class,'edit'])->name('edit-golongan-obat');
Route::put('/obat/update-golongan-obat/{code}',[GolonganObatController::class,'update'])->name('update-golongan-obat');
Route::delete('/obat/delete-golongan-obat/{code}',[GolonganObatController::class,'destroy'])->name('delete-golongan-obat');

//  ROUTE ATURAN PAKAI
Route::get('/obat/data-aturan-pakai',[AturanPakaiController::class,'indexDataAturanPakai'])->name('data-aturan-pakai');
Route::get('/obat/create-aturan-pakai',[AturanPakaiController::class,'indexCreateAturanPakai'])->name('create-aturan-pakai');
Route::post('/obat/create-aturan-pakai',[AturanPakaiController::class,'store'])->name('store-aturan-pakai');
Route::get('/obat/edit-aturan-pakai/{code}',[AturanPakaiController::class,'edit'])->name('edit-aturan-pakai');
Route::put('/obat/update-aturan-pakai/{code}',[AturanPakaiController::class,'update'])->name('update-aturan-pakai');
Route::delete('/obat/delete-aturan-pakai/{code}',[AturanPakaiController::class,'destroy'])->name('delete-aturan-pakai');

// ROUTE TEMPLATE PO
Route::get('/template/data-template-po',[TemplatePoController::class,'indexDataTemplatePo'])->name('data-template-po');
Route::get('/template/create-template-po',[TemplatePoController::class,'indexCreateTemplatePo'])->name('create-template-po');
Route::post('/template/create-template-po',[TemplatePoController::class,'store'])->name('store-plate-po');
Route::get('/template/edit-template-po/{code}',[TemplatePoController::class,'edit'])->name('edit-template-po');
Route::put('/template/update-template-po/{code}',[TemplatePoController::class,'update'])->name('update-template-po');
Route::delete('/template/delete-template-po/{code}',[TemplatePoController::class,'destroy'])->name('delete-template-po');

// TIPE HARGA JUAL
Route::get('/template/data-tipe-harga-jual',[TipeHargaJualController::class,'indexDataTipeHarga'])->name('data-tipe-harga-jual');
Route::get('/template/create-tipe-harga-jual',[TipeHargaJualController::class,'indexCreateTipeHarga'])->name('create-tipe-harga-jual');
Route::post('/template/create-tipe-harga-jual',[TipeHargaJualController::class,'store'])->name('store-tipe-harga-jual');
Route::get('/template/edit-tipe-harga-jual/{code}',[TipeHargaJualController::class,'edit'])->name('edit-tipe-harga-jual');
Route::put('/template/update-tipe-harga-jual/{code}',[TipeHargaJualController::class,'update'])->name('update-tipe-harga-jual');
Route::delete('/template/delete-tipe-harga-jual/{code}',[TipeHargaJualController::class,'destroy'])->name('delete-tipe-harga-jual');

// ROUTE DISTRIBUTOR
Route::get('/distributor/data-distributor',[DistributorController::class,'indexDataDistributor'])->name('data-distributor');
Route::get('/distributor/create-distributor',[DistributorController::class,'indexCreateDistributor'])->name('create-distributor');
Route::post('/distributor/create-distributor',[DistributorController::class,'store'])->name('store-distributor');
Route::get('/distributor/edit-distributor/{code}',[DistributorController::class,'edit'])->name('edit-distributor');
Route::put('/distributor/update-distributor/{code}',[DistributorController::class,'update'])->name('update-distributor');
Route::delete('/distributor/delete-distributor/{code}',[DistributorController::class,'destroy'])->name('delete-distributor');

// ROUTE OBAT
Route::get('/obat/data-obat',[ObatController::class, 'indexDataObat'])->name('data-obat');
Route::get('/obat/create-obat',[ObatController::class, 'indexCreateObat'])->name('create-obat');
Route::post('/obat/create-obat',[ObatController::class, 'store'])->name('store-obat');
Route::get('/obat/edit-obat/{code}',[ObatController::class, 'edit'])->name('edit-obat');
Route::put('/obat/update-obat/{code}',[ObatController::class, 'update'])->name('update-obat');
Route::delete('/obat/delete-obat/{code}',[ObatController::class, 'destroy'])->name('delete-obat');

// ROUTE CARA PAKAI OBAT
Route::get('/cara-pakai/data-cara-pakai',[CaraPakaiObatController::class, 'indexDataCaraPakai'])->name('data-cara-pakai');
Route::get('/cara-pakai/create-cara-pakai',[CaraPakaiObatController::class, 'indexCreateCaraPakai'])->name('create-cara-pakai');
Route::post('/cara-pakai/create-cara-pakai',[CaraPakaiObatController::class, 'store'])->name('store-cara-pakai');
Route::get('/cara-pakai/edit-cara-pakai/{code}',[CaraPakaiObatController::class, 'edit'])->name('edit-cara-pakai');
Route::put('/cara-pakai/update-cara-pakai/{code}',[CaraPakaiObatController::class, 'update'])->name('update-cara-pakai');
Route::delete('/cara-pakai/delete-cara-pakai/{code}',[CaraPakaiObatController::class, 'destroy'])->name('delete-cara-pakai');

// ROUTE CARA PAKAI OBAT
Route::get('/bentuk-sediaan/data-bentuk-sediaan',[BentukSediaanObatController::class, 'indexDataBentukSediaan'])->name('data-bentuk-sediaan');
Route::get('/bentuk-sediaan/create-bentuk-sediaan',[BentukSediaanObatController::class, 'indexCreateBentukSediaan'])->name('create-bentuk-sediaan');
Route::post('/bentuk-sediaan/create-bentuk-sediaan',[BentukSediaanObatController::class, 'store'])->name('store-bentuk-sediaan');
Route::get('/bentuk-sediaan/edit-bentuk-sediaan/{code}',[BentukSediaanObatController::class, 'edit'])->name('edit-bentuk-sediaan');
Route::put('/bentuk-sediaan/update-bentuk-sediaan/{code}',[BentukSediaanObatController::class, 'update'])->name('update-bentuk-sediaan');
Route::delete('/bentuk-sediaan/delete-bentuk-sediaan/{code}',[BentukSediaanObatController::class, 'destroy'])->name('delete-bentuk-sediaan');
<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\TipeHargaJual;
use App\Models\GolonganObat;
use App\Models\Pabrik;
use App\Models\SpesifikasiDasarObat;
use App\Models\DataHargaObat;
use App\Models\SettingHargaObat;
use App\Models\SatuanObat;
use App\Models\SatuanBarang;
use App\Models\CaraPakaiObat;
use App\Models\Layanan;
use App\Models\StockLimitObat;
use App\Models\Farmakologi;
use App\Models\SpesifikasiObat;
use App\Models\Distributor;
use App\Models\DistributorObat;
use App\Models\BentukSediaanObat;
use App\Models\SatuSehatObat;
use App\Models\ObatBpjs;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ObatController extends Controller
{
    private function generateCode($model, $col, $param){
        $lastRnNumber = $model->whereDate('created_at', Carbon::today())
            ->where($col, 'like', $param . date('dmy') . '%')
            ->orderBy($col, 'desc')
            ->first();

        if ($lastRnNumber) {
            $lastNumber = intval(substr($lastRnNumber->$col, -2));
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        return $param . date('dmy') . $kd;
    }
    public function indexDataObat()
    {
        $dataObat         = Obat::all();
        $spekObat         = SpesifikasiDasarObat::all();
        $hargaObat        = DataHargaObat::all();
        $settingHargaObat = SettingHargaObat::all();
        $pabrik           = Pabrik::all();

        return view('pages.obat.data-obat', [
            'title'            => 'data-obat',
            'dataObat'         => $dataObat,
            'spekObat'         => $spekObat,
            'hargaObat'        => $hargaObat,
            'settingHargaObat' => $settingHargaObat,
            'pabrik'           => $pabrik,
        ]);
    }
    public function indexCreateObat()
    {
        $tipeHargaJual      = TipeHargaJual::all();
        $golonganObat       = GolonganObat::all();
        $pabrik             = Pabrik::all();
        $layanan            = Layanan::all();
        $farmakologi        = Farmakologi::all();
        $distributor        = Distributor::all();
        $satuanBarang       = SatuanBarang::all();
        $caraPakai          = CaraPakaiObat::all();
        $bentukSediaanObat  = BentukSediaanObat::all();
        
        // dd($caraPakai);
        
        return view('pages.obat.create-obat', [
            'title'         => 'create-obat',
            'tipeHargaJual' => $tipeHargaJual, 
            'golonganObat'  => $golonganObat, 
            'pabrik'        => $pabrik, 
            'layanan'       => $layanan, 
            'farmakologi'   => $farmakologi, 
            'distributor'   => $distributor,
            'satuanBarang'  => $satuanBarang,
            'caraPakai'     => $caraPakai,
            'bentukSediaanObat'     => $bentukSediaanObat,
        ]);
    }
    public function store(Request $request){
        // return $request->all();
        // die();
        $validatedData = $request->validate([
            'obat_name'                   => ['required', 'string', 'max:255'],
            'golongan_barang'             => ['required'],
            'pabrik_principal'            => ['required'],
            'lokasi_barang'               => ['required'],
            'default_tax'                 => ['required'],
            'metode_penentuan_harga_jual' => ['required'],
            'metode_persediaan'           => ['required'],
            'satuan_kecil'                => ['required'],
            'satuan_kemasan'              => ['required'],
            'qty_satuan_kemasan'          => ['required'],
            'satuan_kemasan_lainya'       => ['required'],
            'qty_satuan_kemasan_lainya'   => ['required'],
            'satuan_racik'                => ['required'],
            'qty_satuan_racik'            => ['required'],
            'dosis'                       => ['required'],
            'interaksi_obat'              => ['required'],
            'isi_kandungan'               => ['required'],
            'cara_kerja_obat'             => ['required'],
            'indikasi'                    => ['required'],
            'kontraindikasi'              => ['required'],
            'peringatan'                  => ['required'],
            'farmakologi'                 => ['required'],
            'distributor'                 => ['required'],     
            'tipe_harga_jual_code'        => ['required'],
            'tipe_harga_jual_name'        => ['required'],
            'profit_margin'               => ['required'],
            'biaya_tambahan'              => ['required'],
            'kode_layanan'                => ['required'],
            'nama_layanan'                => ['required'],
            'minimal_stock'               => ['required'],
            'maximal_stock'               => ['required'],
            'stock_aktual'                => ['required']
        ]);
        $dataObat = [
            'code_obat' => $this->generateCode(new Obat, 'code_obat', 'OB-'),
            'name_obat' => $request->obat_name,
        ];
        $dataSpekDasar = [
            'code_obat'        => $dataObat['code_obat'],
            'status'           => $request->status ? '1' : '0',
            'barang_racikan'   => $request->barang_racikan ? '1' : '0',
            'golongan_barang'  => $request->golongan_barang,
            'pabrik_principal' => $request->pabrik_principal,
            'lokasi_barang'    => $request->lokasi_barang,
        ];
        $dataHarga = [
            'code_obat'                   => $dataObat['code_obat'],
            'default_tax'                 => $request->default_tax,
            'metode_penentuan_harga_jual' => $request->metode_penentuan_harga_jual,
            'metode_persediaan'           => $request->metode_persediaan,
        ];
        $satuanObat = [
            'code_obat'                 => $dataObat['code_obat'],
            'satuan_kecil'              => $request->satuan_kecil,
            'satuan_kemasan'            => $request->satuan_kemasan,
            'qty_satuan_kemasan'        => $request->qty_satuan_kemasan,
            'satuan_kemasan_lainya'     => $request->satuan_kemasan_lainya,
            'qty_satuan_kemasan_lainya' => $request->qty_satuan_kemasan_lainya,
            'satuan_racik'              => $request->satuan_racik,
            'qty_satuan_racik'          => $request->qty_satuan_racik,
        ];
        $dataSpekObat = [
            'code_obat'       => $dataObat['code_obat'],
            'dosis'           => $request->dosis,
            'interaksi_obat'  => $request->interaksi_obat,
            'isi_kandungan'   => $request->isi_kandungan,
            'cara_kerja_obat' => $request->cara_kerja_obat,
            'indikasi'        => $request->indikasi,
            'kontraindikasi'  => $request->kontraindikasi,
            'peringatan'      => $request->peringatan,
            'farmakologi'     => $request->farmakologi,
        ];
        $dataSatuSehat = [
            'code_obat'            => $dataObat['code_obat'],
            'code_kfa_variant'     => 'DEFAULT',
            'code_kfa_product'     => 'DEFAULT',
            'code_kfa_ingredient'  => 'DEFAULT',
            'cara_pakai'           => $request->cara_pakai,
            'pola_pemberian'       => $request->pola_pemberian,
            'bentuk_sediaan_obat'  => $request->bentuk_sediaan_obat,
        ];
        $dataBpjs = [
            'code_obat'            => $dataObat['code_obat'],
            'code_obat_dpoh'       => $request->code_obat_dpoh,
        ];
        // echo"<pre>";print_r($dataSatuSehat);die; 
        // $findDistributor = $request->distributor;
        $findDistributor = Distributor::where('distributor_code', $request->distributor)->first();
        // echo"<pre>";print_r($findDistributor);die;
        $dataDistributor = [
            'code_obat'            => $dataObat['code_obat'],
            'distributor_code'     => $request->distributor,
            'distributor_name'     => $findDistributor->distributor_name,
        ];
        // echo"<pre>";print_r($dataSpekObat);die;
        $tipe_harga_jual_code   = (array)($request->tipe_harga_jual_code ?? []);
        $tipe_harga_jual_name   = (array)($request->tipe_harga_jual_name ?? []);
        $profit_margin          = (array)($request->profit_margin ?? []);
        $biaya_tambahan         = (array)($request->biaya_tambahan ?? []);
        
        $hargaObat = [
            "data_harga_obat" => [],
        ];
        
        $totalObat = min(count($tipe_harga_jual_code), count($tipe_harga_jual_name), count($profit_margin), count($biaya_tambahan));
        
        for ($i = 0; $i < $totalObat; $i++) {
            $hargaObat['data_harga_obat'][] = [
            'code_obat'            => $dataObat['code_obat'],
            'tipe_harga_jual_code' => $tipe_harga_jual_code[$i],
            'tipe_harga_jual_name' => $tipe_harga_jual_name[$i],
            'profit_margin'        =>  preg_replace('/\D/', '', $profit_margin[$i]),
            'biaya_tambahan'       => preg_replace('/\D/', '', $biaya_tambahan[$i]), // Ensure biaya_tambahan is cast to float
            ];
        }

        $kode_layanan   = (array)($request->kode_layanan ?? []);
        $nama_layanan   = (array)($request->nama_layanan ?? []);
        $minimal_stock  = (array)($request->minimal_stock ?? []);
        $maximal_stock  = (array)($request->maximal_stock ?? []);
        $stock_aktual   = (array)($request->stock_aktual ?? []);
        
        $stockLimit = [
            "data_stock_limit" => [],
        ];
        
        $totalStockLimit = min(count($kode_layanan), count($nama_layanan), count($minimal_stock), count($maximal_stock), count($stock_aktual));
        
        for ($i = 0; $i < $totalStockLimit; $i++) {
            $stockLimit['data_stock_limit'][] = [
            'code_obat'     => $dataObat['code_obat'],
            'kode_layanan'  => $kode_layanan[$i],
            'nama_layanan'  => $nama_layanan[$i],
            'minimal_stock' => $minimal_stock[$i],
            'maximal_stock' => $maximal_stock[$i], // Ensure biaya_tambahan is cast to float
            'stock_aktual'  => $stock_aktual[$i], // Ensure biaya_tambahan is cast to float
            ];
        }
        // echo"<pre>";print_r($stockLimit);die;

            $createObat             = Obat::create($dataObat);
            $createSpekDasar        = SpesifikasiDasarObat::create($dataSpekDasar);
            $createHargaObat        = DataHargaObat::create($dataHarga);
            $createSatuanObat       = SatuanObat::create($satuanObat);
            $createSpekObat         = SpesifikasiObat::create($dataSpekObat);
            $createDistributor      = DistributorObat::create($dataDistributor);
            $createSatuSehat        = SatuSehatObat::create($dataSatuSehat);
            $createBpjs             = ObatBpjs::create($dataBpjs);

            $createSettingHargaObat = SettingHargaObat::insert($hargaObat['data_harga_obat']);
            $createStockLimit       = StockLimitObat::insert($stockLimit['data_stock_limit']);

        if ($createObat && $createSpekDasar && $createHargaObat && $createSettingHargaObat && $createSatuanObat && $createStockLimit && $createSpekObat && $createDistributor && $createSatuSehat && $createBpjs) {
            return redirect()->route('data-obat')->with('success', 'Data obat berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data obat.');
        }

    }

    public function edit($code){
        $tipeHargaJual      = TipeHargaJual::all();
        $golonganObat       = GolonganObat::all();
        $pabrik             = Pabrik::all();
        $layanan            = Layanan::all();
        $farmakologi        = Farmakologi::all();
        $distributor        = Distributor::all();
        $satuanBarang       = SatuanBarang::all();
        $caraPakai          = CaraPakaiObat::all();
        $bentukSediaanObat  = BentukSediaanObat::all();
        
        $dataObat         = Obat::where('code_obat', $code)->first();
        $spekDasar        = SpesifikasiDasarObat::where('code_obat', $code)->first();
        $hargaObat        = DataHargaObat::where('code_obat', $code)->get();
        $settingHargaObat = SettingHargaObat::where('code_obat', $code)->get();
        $satuanObat       = SatuanObat::where('code_obat', $code)->first();
        $spekObat         = SpesifikasiObat::where('code_obat', $code)->first();
        $satuSehat         = SatuSehatObat::where('code_obat', $code)->first();
        // echo"<pre>";print_r($satuSehat);die;
        $distributorObat  = DistributorObat::where('code_obat', $code)->first();
        $stockLimitObat   = StockLimitObat::where('code_obat', $code)->get();
        $data = [
            'dataObat'              => $dataObat,
            'tipeHargaJual'         => $tipeHargaJual,
            'golonganObat'          => $golonganObat,
            'pabrik'                => $pabrik,
            'layanan'               => $layanan,
            'farmakologi'           => $farmakologi,
            'distributor'           => $distributor,
            'spekObat'              => $spekObat,
            'spekDasar'             => $spekDasar,
            'hargaObat'             => $hargaObat,
            'settingHargaObat'      => $settingHargaObat,
            'satuanObat'            => $satuanObat,
            'distributorObat'       => $distributorObat,
            'stockLimitObat'        => $stockLimitObat,
            'satuanBarang'          => $satuanBarang,
            'caraPakai'             => $caraPakai,
            'bentukSediaanObat'     => $bentukSediaanObat,
            'satuSehat'             => $satuSehat,
        ];
        // echo"<pre>";print_r($data['caraPakai']);die;
        return view('pages.obat.edit-obat', ['data' => $data,  'title' => 'edit-obat',]);
    }
    public function update(Request $request, $code){
        $validatedData = $request->validate([
            'obat_name'                   => ['required', 'string', 'max:255'],
            'code_obat'                   => ['required'],
            'golongan_barang'             => ['required'],
            'pabrik_principal'            => ['required'],
            'lokasi_barang'               => ['required'],
            'default_tax'                 => ['required'],
            'metode_penentuan_harga_jual' => ['required'],
            'metode_persediaan'           => ['required'],
            'satuan_kecil'                => ['required'],
            'satuan_kemasan'              => ['required'],
            'qty_satuan_kemasan'          => ['required'],
            'satuan_kemasan_lainya'       => ['required'],
            'qty_satuan_kemasan_lainya'   => ['required'],
            'satuan_racik'                => ['required'],
            'qty_satuan_racik'            => ['required'],
            'dosis'                       => ['required'],
            'interaksi_obat'              => ['required'],
            'isi_kandungan'               => ['required'],
            'cara_kerja_obat'             => ['required'],
            'indikasi'                    => ['required'],
            'kontraindikasi'              => ['required'],
            'peringatan'                  => ['required'],
            'farmakologi'                 => ['required'],
            'distributor'                 => ['required'],
            'tipe_harga_jual_code'        => ['required'],
            'tipe_harga_jual_name'        => ['required'],
            'profit_margin'               => ['required'],
            'biaya_tambahan'              => ['required'],
            'kode_layanan'                => ['required'],
            'nama_layanan'                => ['required'],
            'minimal_stock'               => ['required'],
            'maximal_stock'               => ['required'],
            'stock_aktual'                => ['required']
        ]);
        $dataObat = [
            'name_obat' => $request->obat_name,
        ];
        $dataSpekDasar = [
            'code_obat'        => $code,
            'status'           => $request->status ? '1' : '0',
            'barang_racikan'   => $request->barang_racikan ? '1' : '0',
            'golongan_barang'  => $request->golongan_barang,
            'pabrik_principal' => $request->pabrik_principal,
            'lokasi_barang'    => $request->lokasi_barang,
        ];
        $dataHarga = [
            'code_obat'                   => $code,
            'default_tax'                 => $request->default_tax,
            'metode_penentuan_harga_jual' => $request->metode_penentuan_harga_jual,
            'metode_persediaan'           => $request->metode_persediaan,
        ];
        $satuanObat = [
            'code_obat'                 => $code,
            'satuan_kecil'              => strtoupper($request->satuan_kecil),
            'satuan_kemasan'            => $request->satuan_kemasan,
            'qty_satuan_kemasan'        => $request->qty_satuan_kemasan,
            'satuan_kemasan_lainya'     => $request->satuan_kemasan_lainya,
            'qty_satuan_kemasan_lainya' => $request->qty_satuan_kemasan_lainya,
            'satuan_racik'              => $request->satuan_racik,
            'qty_satuan_racik'          => $request->qty_satuan_racik,
        ];
        // echo"<pre>";print_r($satuanObat);die;
        $dataSpekObat = [
            'code_obat'       => $code,
            'dosis'           => $request->dosis,
            'interaksi_obat'  => $request->interaksi_obat,
            'isi_kandungan'   => $request->isi_kandungan,
            'cara_kerja_obat' => $request->cara_kerja_obat,
            'indikasi'        => $request->indikasi,
            'kontraindikasi'  => $request->kontraindikasi,
            'peringatan'      => $request->peringatan,
            'farmakologi'     => $request->farmakologi,
        ];

        $dataSatuSehat = [
            'code_obat'            => $code,
            'code_kfa_variant'     => 'DEFAULT',
            'code_kfa_product'     => 'DEFAULT',
            'code_kfa_ingredient'  => 'DEFAULT',
            'cara_pakai'           => $request->cara_pakai,
            'pola_pemberian'       => $request->pola_pemberian,
            'bentuk_sediaan_obat'  => $request->bentuk_sediaan_obat,
        ];

        $dataBpjs = [
            'code_obat'            => $code,
            'code_obat_dpoh'       => $request->code_obat_dpoh,
        ];
        // $findDistributor = $request->distributor;
        $findDistributor = Distributor::where('distributor_code', $request->distributor)->first();
        // echo"<pre>";print_r($findDistributor);die;
        $dataDistributor = [
            'code_obat'            => $code,
            'distributor_code'     => $request->distributor,
            'distributor_name'     => $findDistributor->distributor_name,
        ];
        // echo"<pre>";print_r($dataSpekObat);die;
        $tipe_harga_jual_code   = (array)($request->tipe_harga_jual_code ?? []);
        $tipe_harga_jual_name   = (array)($request->tipe_harga_jual_name ?? []);
        $profit_margin          = (array)($request->profit_margin ?? []);
        $biaya_tambahan         = (array)($request->biaya_tambahan ?? []);
        
        $hargaObat = [
            "data_harga_obat" => [],
        ];
        
        $totalObat = min(count($tipe_harga_jual_code), count($tipe_harga_jual_name), count($profit_margin), count($biaya_tambahan));
        
        for ($i = 0; $i < $totalObat; $i++) {
            $hargaObat['data_harga_obat'][] = [
            'code_obat'            => $code,
            'tipe_harga_jual_code' => $tipe_harga_jual_code[$i],
            'tipe_harga_jual_name' => $tipe_harga_jual_name[$i],
            'profit_margin'        =>  preg_replace('/\D/', '', $profit_margin[$i]),
            'biaya_tambahan'       => preg_replace('/\D/', '', $biaya_tambahan[$i]), // Ensure biaya_tambahan is cast to float
            ];
        }

        $kode_layanan   = (array)($request->kode_layanan ?? []);
        $nama_layanan   = (array)($request->nama_layanan ?? []);
        $minimal_stock  = (array)($request->minimal_stock ?? []);
        $maximal_stock  = (array)($request->maximal_stock ?? []);
        $stock_aktual   = (array)($request->stock_aktual ?? []);
        
        $stockLimit = [
            "data_stock_limit" => [],
        ];
        
        $totalStockLimit = min(count($kode_layanan), count($nama_layanan), count($minimal_stock), count($maximal_stock), count($stock_aktual));
        
        for ($i = 0; $i < $totalStockLimit; $i++) {
            $stockLimit['data_stock_limit'][] = [
            'code_obat'     => $code,
            'kode_layanan'  => $kode_layanan[$i],
            'nama_layanan'  => $nama_layanan[$i],
            'minimal_stock' => $minimal_stock[$i],
            'maximal_stock' => $maximal_stock[$i], // Ensure biaya_tambahan is cast to float
            'stock_aktual'  => $stock_aktual[$i], // Ensure biaya_tambahan is cast to float
            ];
        }


            $updateObat            = Obat::where('code_obat', $code)->update($dataObat);
            $updateSpekDasar       = SpesifikasiDasarObat::where('code_obat', $code)->update($dataSpekDasar);
            $updateHargaObat       = DataHargaObat::where('code_obat', $code)->update($dataHarga);
            $updateSatuanObat      = SatuanObat::where('code_obat', $code)->update($satuanObat);
            $updateSpekObat        = SpesifikasiObat::where('code_obat', $code)->update($dataSpekObat);
            $updateDistributor     = DistributorObat::where('code_obat', $code)->update($dataDistributor);
            $updateSatuSehat       = SatuSehatObat::where('code_obat', $code)->update($dataSatuSehat);
            $updateBpjs            = ObatBpjs::where('code_obat', $code)->update($dataBpjs);

            foreach ($hargaObat['data_harga_obat'] as $harga) {
            SettingHargaObat::where('code_obat', $code)
                ->where('tipe_harga_jual_code', $harga['tipe_harga_jual_code'])
                ->update($harga);
            }
            foreach ($stockLimit['data_stock_limit'] as $stockLimit) {
            StockLimitObat::where('code_obat', $code)
                ->where('kode_layanan', $stockLimit['kode_layanan'])
                ->update($stockLimit);
            }
        
            return redirect()->route('data-obat')->with('success', 'Data obat berhasil disimpan.');
        // if ($updateObat && $updateSpekDasar && $updateHargaObat && $updateSatuanObat && $updateSpekObat && $updateDistributor && $updateSatuSehat && $updateBpjs) {
        // } else {
        //     return redirect()->back()->with('error', 'Gagal menyimpan data obat.');
        // }
    }
    public function destroy($code){
        $deleteObat            = Obat::where('code_obat', $code)->delete();
        $deleteSpekDasar       = SpesifikasiDasarObat::where('code_obat', $code)->delete();
        $deleteHargaObat       = DataHargaObat::where('code_obat', $code)->delete();
        $deleteSatuanObat      = SatuanObat::where('code_obat', $code)->delete();
        $deleteSpekObat        = SpesifikasiObat::where('code_obat', $code)->delete();
        $deleteDistributor     = DistributorObat::where('code_obat', $code)->delete();
        $deleteSettingHargaObat = SettingHargaObat::where('code_obat', $code)->delete();
        $deleteStockLimit       = StockLimitObat::where('code_obat', $code)->delete();

        if ($deleteObat && $deleteSpekDasar && $deleteHargaObat && $deleteSatuanObat && $deleteSpekObat && $deleteDistributor && $deleteSettingHargaObat && $deleteStockLimit) {
            return redirect()->route('data-obat')->with('success', 'Data obat berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data obat.');
        }
    }
}

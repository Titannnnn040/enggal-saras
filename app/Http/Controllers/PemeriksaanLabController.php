<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokLab;
use App\Models\SatuanLab;
use App\Models\RentangNormal;
use App\Models\PemeriksaanLab;
use App\Models\DataTestLabKuantitatif;
use App\Models\DataTestLabKualitatif;
use App\Models\DataTestLabKualitatifKhusus;
use Carbon\Carbon;

use Illuminate\Support\Str;

class PemeriksaanLabController extends Controller
{
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function generateCode($model, $col, $param){
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
    public function indexData(){
        $dataPemeriksaan = PemeriksaanLab::latest();
        return view('pages.m_lab.pemeriksaan.data-pemeriksaan', ['title' => 'data-pemeriksaan-lab', 'data' => $dataPemeriksaan->get()]);
    }

    public function indexCreate(){

        $kelompok = KelompokLab::all();
        $satuanLab = SatuanLab::all();
        $rentangNormal = RentangNormal::all();

        $data = [
            'kelompok' => $kelompok,
            'satuan' => $satuanLab,
            'rentangNormal' => $rentangNormal,
        ];
        return view('pages.m_lab.pemeriksaan.create-pemeriksaan', ['title' => 'create-pemeriksaan-lab', 'data' => $data]);
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'jenis' => 'required',
            'kelompok' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);
        $data = $request->all();
        $dataPemeriksaanLab = [
            'uuid'          => (string) Str::uuid(),
            'code'          => $this->generateCode(new PemeriksaanLab, 'code', 'TL-'),
            'name'          => $data['name'],
            'jenis'         => $data['jenis'],
            'kelompok'      => $data['kelompok'],
            'satuan'        => $data['satuan'],
            'keterangan'    => $data['keterangan'],
            'hasil_rahasia' => isset($data['hasil_rahasia']) ? 1 : 0,
            'tipe'          => $data['change-form-lab'],
        ];
        if(!isset($data['change-form-lab'])){
            return redirect()->route('create-pemeriksaan-lab')->with('error', 'Form Pemeriksaan Lab Tidak Boleh Kosong');
        }
        // echo '<pre>';print_r($dataPemeriksaanLab);die;
        $createPemeriksaanLab = PemeriksaanLab::create($dataPemeriksaanLab);
        if($data['change-form-lab'] == 1){
            $dataKuantitatif = json_decode($data['hiddenKuantitatif']);
            foreach($dataKuantitatif as $value){
                $dataKuantitatifInsert =[
                    'uuid_test'      => $dataPemeriksaanLab['uuid'],
                    'rentang_normal' => $value->rentang_normal_kuantitatif,
                    'keterangan1'    => $value->keterangan_kuantitatif,
                    'batas_bawah'    => $value->batas_bawah_kuantitatif,
                    'antara'         => $value->antara_kuantitatif,
                    'batas_atas'     => $value->batas_atas_kuantitatif,
                    'keterangan2'    => $value->keterangan2_kuantitatif
                ];
                $create = DataTestLabKuantitatif::create($dataKuantitatifInsert);
                if(!$create){
                    return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Kuantitatif Gagal Ditambahkan');
                }
            }
        }elseif($data['change-form-lab'] == 2){
            $dataKualitatif = json_decode($data['hiddenKualitatif']);
            foreach($dataKualitatif as $value){
                $dataKualitatifInsert =[
                    'uuid_test'      => $dataPemeriksaanLab['uuid'],
                    'rentang_normal'        => $value->rentang_normal_kualitatif,
                    'keterangan_positif'    => $value->keterangan_positif_kualitatif,
                    'n_plus'                => $value->n_plus_kualitatif == 'Aktif' ? 1 : 0,
                    'keterangan_negatif'    => $value->keterangan_negatif_kualitatif,
                    'n_min'                 => $value->n_min_kualitatif == 'Aktif' ? 1 : 0,
                ];
                $create = DataTestLabKualitatif::create($dataKualitatifInsert);
                if(!$create){
                    return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Kualitatif Gagal Ditambahkan');
                }
            }
        }elseif($data['change-form-lab'] == 3){
            $dataKualitatifKhusus = json_decode($data['hiddenKualitatifKhusus']);
            foreach($dataKualitatifKhusus as $value){
                $datadataKualitatifKhususInsert =[
                    'uuid_test'      => $dataPemeriksaanLab['uuid'],
                    'rentang_normal'    => $value->rentang_normal_kualitatif_khusus,
                    'normal'            => $value->normal_kualitatif_khusus,
                    'keterangan_tidak_normal' => $value->keterangan_tidak_normal_kualitatif_khusus,
                    'skala' =>  isset($data['skala_kualitatif_khusus']) ? $data['skala_kualitatif_khusus'] : 0,
                    'narasi' => isset($data['narasi_kualitatif_khusus']) ? $data['narasi_kualitatif_khusus'] : 0,
                    'keterangan_normal' => $data['keterangan_normal_kualitatif_khusus'],
                ];
                $create = DataTestLabKualitatifKhusus::create($datadataKualitatifKhususInsert);
                if(!$create){
                    return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Kualitatif Khusus Gagal Ditambahkan');
                }
            }
        }
        if($createPemeriksaanLab){
            return redirect()->route('data-pemeriksaan-lab')->with('success', 'Data Berhasil Ditambahkan');
        }else{
            return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Gagal Ditambahkan');
        }
        
    }
    public function edit($uuid){
        $kelompok = KelompokLab::all();
        $satuanLab = SatuanLab::all();
        $rentangNormal = RentangNormal::all();
        $dataPemeriksaanLab = PemeriksaanLab::where('uuid', $uuid)->first();
        $dataTestLabKuantitatif = DataTestLabKuantitatif::where('uuid_test', $uuid)->get();
        $dataTestLabKualitatif = DataTestLabKualitatif::where('uuid_test', $uuid)->get();
        $dataTestLabKualitatifKhusus = DataTestLabKualitatifKhusus::where('uuid_test', $uuid)->get();
        // echo '<pre>';print_r($dataTestLabKualitatifKhusus);die;
        $data = [
            'kelompok'                  => $kelompok,
            'satuan'                    => $satuanLab,
            'rentangNormal'             => $rentangNormal,
            'dataPemeriksaanLab'        => $dataPemeriksaanLab,
            'dataTestLabKuantitatif'    => $dataTestLabKuantitatif,
            'dataTestLabKualitatif'     => $dataTestLabKualitatif,
            'dataTestLabKualitatifKhusus' => $dataTestLabKualitatifKhusus,
        ];
        // echo"<pre>";print_r($data['dataTestLabKualitatifKhusus']);die;
        return view('pages.m_lab.pemeriksaan.edit-pemeriksaan', ['title' => 'edit-pemeriksaan-lab', 'data' => $data]);
    }
    public function update(Request $request, $uuid){
        $request->validate([
            'name' => 'required',
            'jenis' => 'required',
            'kelompok' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);
        $data = $request->all();
        $dataPemeriksaanLab = [
            'name'          => $data['name'],
            'jenis'         => $data['jenis'],
            'kelompok'      => $data['kelompok'],
            'satuan'        => $data['satuan'],
            'keterangan'    => $data['keterangan'],
            'hasil_rahasia' => isset($data['hasil_rahasia']) ? 1 : 0,
            'tipe'          => $data['change-form-lab'],
        ];
        if(!isset($data['change-form-lab'])){
            return back()->with('error', 'Form Pemeriksaan Lab Tidak Boleh Kosong');
        }
        $editPemeriksaanLab = PemeriksaanLab::where('uuid', $uuid)->update($dataPemeriksaanLab);
        if($data['change-form-lab'] == 1){
            $dataKuantitatif = json_decode($data['hiddenKuantitatif']);
            foreach($dataKuantitatif as $value){
                $dataKuantitatifInsert =[
                    'uuid_test'      => $uuid,
                    'rentang_normal' => $value->rentang_normal_kuantitatif,
                    'keterangan1'    => $value->keterangan_kuantitatif,
                    'batas_bawah'    => $value->batas_bawah_kuantitatif,
                    'antara'         => $value->antara_kuantitatif,
                    'batas_atas'     => $value->batas_atas_kuantitatif,
                    'keterangan2'    => $value->keterangan2_kuantitatif
                ];
                DataTestLabKuantitatif::where('uuid_test', $uuid)->delete();
                $create = DataTestLabKuantitatif::create($dataKuantitatifInsert);
                if(!$create){
                    return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Kuantitatif Gagal Ditambahkan');
                }
            }
        }elseif($data['change-form-lab'] == 2){
            $dataKualitatif = json_decode($data['hiddenKualitatif']);
            foreach($dataKualitatif as $value){
                $dataKualitatifInsert =[
                    'uuid_test'      => $uuid,
                    'rentang_normal'        => $value->rentang_normal_kualitatif,
                    'keterangan_positif'    => $value->keterangan_positif_kualitatif,
                    'n_plus'                => $value->n_plus_kualitatif == 'Aktif' ? 1 : 0,
                    'keterangan_negatif'    => $value->keterangan_negatif_kualitatif,
                    'n_min'                 => $value->n_min_kualitatif == 'Aktif' ? 1 : 0,
                ];
                DataTestLabKualitatif::where('uuid_test', $uuid)->delete();
                $create = DataTestLabKualitatif::create($dataKualitatifInsert);
                if(!$create){
                    return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Kualitatif Gagal Ditambahkan');
                }
            }
        }elseif($data['change-form-lab'] == 3){
            $dataKualitatifKhusus = json_decode($data['hiddenKualitatifKhusus']);
            foreach($dataKualitatifKhusus as $value){
                $datadataKualitatifKhususInsert =[
                    'uuid_test'         => $uuid,
                    'rentang_normal'    => $value->rentang_normal_kualitatif_khusus,
                    'normal'            => $value->normal_kualitatif_khusus,
                    'keterangan_tidak_normal' => $value->keterangan_tidak_normal_kualitatif_khusus,
                    'skala' =>  isset($data['skala_kualitatif_khusus']) ? $data['skala_kualitatif_khusus'] : 0,
                    'narasi' => isset($data['narasi_kualitatif_khusus']) ? $data['narasi_kualitatif_khusus'] : 0,
                    'keterangan_normal' => $data['keterangan_normal_kualitatif_khusus'],
                ];
                DataTestLabKualitatifKhusus::where('uuid_test', $uuid)->delete();
                $create = DataTestLabKualitatifKhusus::create($datadataKualitatifKhususInsert);
                if(!$create){
                    return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Kualitatif Khusus Gagal Diedit');
                }
            }
        }
        if($editPemeriksaanLab){
            return redirect()->route('data-pemeriksaan-lab')->with('success', 'Data Berhasil Diedit');
        }else{
            return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Gagal Diedit');
        }
    }
    public function destroy($uuid){
        $dataPemeriksaanLab = PemeriksaanLab::where('uuid', $uuid)->delete();
        if($dataPemeriksaanLab){
            return redirect()->route('data-pemeriksaan-lab')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect()->route('data-pemeriksaan-lab')->with('error', 'Data Gagal Dihapus');
        }
    }
}

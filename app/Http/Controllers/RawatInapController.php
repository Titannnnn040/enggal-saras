<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Models\Jaminan;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Perawat;
use App\Models\TarifPendaftaran;
use App\Models\TarifTindakan;
use App\Models\RegisterPasien;
use App\Models\TindakanRawatInap;
use App\Models\DetailTindakanRawatInap;
use App\Models\Rawat_Jalan as Pasien;

use Illuminate\Http\Request;
use Carbon\Carbon;

class RawatInapController extends Controller
{
    public function getDoctorsByLayanan($noDokter)
    {
        // Cari dokter berdasarkan layanan_id
        $dokter = Dokter::where('no_dokter', $noDokter)->get();
    
        // Kembalikan data dalam format JSON
        return response()->json($dokter);
    }
    private function generateCode($model, $col, $param){
        $lastRnNumber = $model->whereDate('created_at', Carbon::today())
            ->where($col, 'like', $param . date('dmy') . '%')
            ->orderBy($col, 'desc')
            ->first();

        if ($lastRnNumber) {
            $lastNumber = intval(substr($lastRnNumber->$col, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return $param . date('dmy') . $kd;
    }

    public function indexCreateRawatInap($id)
    {
        $jaminan = Jaminan::all();
        $layanan = Layanan::all();
        $dokterAll = Dokter::all();
        $perawat = Perawat::all();
        $tarifPendaftaran = TarifPendaftaran::all();
        $registPasien = RegisterPasien::find($id);
        $tarifPendaftaran = TarifPendaftaran::all();
        return view('pages.rawat_inap.create-rawat-inap', ['title' => 'create-rawat-inap', 'registPasien' => $registPasien, 'jaminan' => $jaminan, 'layanan' => $layanan, 'dokterAll' => $dokterAll, 'perawat' => $perawat, 'tarifPendaftaran' => $tarifPendaftaran]);
    }

    public function indexDataRawatInap()
    {
        $jaminan = Jaminan::all();
        $pasien = Pasien::all();
        $layanan = Layanan::all();
        $dokterAll = Dokter::all();
        $perawat = Perawat::all();
        $tarifPendaftaran = TarifPendaftaran::all();
        $rawatInap = RawatInap::all();
        $tarifPendaftaran = TarifPendaftaran::all();
        $tindakanRawatInap = TindakanRawatInap::all();
        $detailTindakanRawatInap = DetailTindakanRawatInap::all();
        return view('pages.rawat_inap.data-rawat-inap', ['title' => 'data-rawat-inap', 'pasien' => $pasien, 'rawatInap' => $rawatInap, 'jaminan' => $jaminan, 'layanan' => $layanan, 'dokterAll' => $dokterAll, 'perawat' => $perawat, 'tarifPendaftaran' => $tarifPendaftaran, 'tindakanRawatInap' => $tindakanRawatInap, 'detailTindakanRawatInap' => $detailTindakanRawatInap]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->layanan_id == 3){
            $validatedData = $request->validate([
                'rawat_inap_code' => [''],
                'regist_code' => [''],
                'no_reservasi' => [''],
                'no_antrian' => ['required'],
                'no_rm' => ['required'],
                'pasien_name' => ['required'],
                'jaminan' => ['required'],
                'layanan_id' => ['required'],
                'dokter_code' => ['required'],
                'perawat_code' => ['required'],
                'no_bpjs' => [''],
                'tarif_pendaftaran' => ['required'],
                'biaya' => ['required'],
                'jam_praktek' => [''],
                'keterangan_rujukan' => [''],
                'jenis_kunjungan' => [''],
                'saturasi_oksigen' => [''],
                'suhu' => [''],
                'tinggi_badan' => [''],
                'berat_badan' => [''],
                'lingkar_perut' => [''],
                'imt' => [''],
                'keluhan' => [''],
                'sistole' => [''],
                'diastole' => [''],
                'respiratory_rate' => [''],
                'heart_rate' => [''],
                'lingkar_kepala' => [''],
            ]);
        }else{
            $validatedData = $request->validate([
                'rawat_inap_code' => [''],
                'regist_code' => [''],
                'no_reservasi' => [''],
                'no_antrian' => ['required'],
                'no_rm' => ['required'],
                'pasien_name' => ['required'],
                'jaminan' => ['required'],
                'layanan_id' => ['required'],
                'dokter_code' => ['required'],
                'perawat_code' => ['required'],
                'no_bpjs' => [''],
                'tarif_pendaftaran' => ['required'],
                'biaya' => ['required'],
                'jam_praktek' => ['required'],
                'keterangan_rujukan' => [''],
                'jenis_kunjungan' => [''],
                'saturasi_oksigen' => [''],
                'suhu' => [''],
                'tinggi_badan' => [''],
                'berat_badan' => [''],
                'lingkar_perut' => [''],
                'imt' => [''],
                'keluhan' => [''],
                'sistole' => [''],
                'diastole' => [''],
                'respiratory_rate' => [''],
                'heart_rate' => [''],
                'lingkar_kepala' => [''],
            ]);
        }
        $rawatInap = RawatInap::query();
        $validatedData['rawat_inap_code'] = $this->generateCode($rawatInap, 'rawat_inap_code', 'RI-');
        // echo "<pre>"; print_r($validatedData); die;
        RawatInap::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-rawat-inap');
    }
    public function getTindakantData($tindakanCode)
    {
        // Cari data pasien berdasarkan nomor rekam medis
        $data = TarifTindakan::where('code_tarif_tindakan', $tindakanCode)->first();

        // Periksa apakah data ditemukan
        if ($data) {
            return response()->json([
                'nama_tarif_tindakan' => $data->nama_tarif_tindakan,
                'total_tarif' => $data->total_tarif,
            ]);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
    public function indexCreateTindakanRawatInap($code){
        $tindakan = TarifTindakan::all();
        $rawatInap = RawatInap::where('rawat_inap_code', $code)->first();
        $dokter = Dokter::where('layanan_id', 3)->get();
        return view('pages.rawat_inap.create-tindakan', ['title' => 'create-tindakan-rawat-inap', 'rawatInap' => $rawatInap, 'dokter' => $dokter, 'tindakan' => $tindakan]);
    }
    public function storeTindakan(Request $request)
    {
        $request->validate([
            'tindakan_date' => ['required'],
            'tindakan_time' => ['required'],
            'dokter_code' => ['required'],
            'tindakan_rawat_inap_code' => [''],
            'tindakan_code' => ['required'],
            'tarif_tindakan' => ['required'],
            'qty' => ['required'],
            'discount' => ['required'],
        ]);

        $tindakanRawatInap = TindakanRawatInap::query();
        $data = [
            'tindakan_code' => $this->generateCode($tindakanRawatInap, 'tindakan_code', 'TRI-'),
            'tindakan_date' => $request->tindakan_date,
            'tindakan_time' => $request->tindakan_time,
            'dokter_code' => $request->dokter_code,
            'regist_code' => $request->regist_code,
            'no_rm' => $request->no_rm,
            'pasien_name' => $request->pasien_name,
            'layanan_id' => $request->layanan_id,
            'all_tarif' => $request->all_tarif,
            'all_discount' => $request->all_discount,
            'final_tarif' => $request->final_tarif,
            'dataTindakan' => [],
        ];

        $tindakanCode = $request->tindakan_code ?? [];
        $tindakanName = $request->tindakan_name ?? [];
        $tarifTindakan = $request->tarif_tindakan ?? [];
        $qty = $request->qty ?? [];
        $discount = $request->discount ?? [];
        $totalTarif = $request->total_tarif ?? [];

        $totalTindakan = min(count($tindakanCode), count($tindakanName), count($tarifTindakan), count($qty), count($discount), count($totalTarif));

        for ($i = 0; $i < $totalTindakan; $i++) {
            $data['dataTindakan'][] = [
                "tindakan_rawat_inap_code" => $data['tindakan_code'],
                "tindakanCode" => $tindakanCode[$i],
                "tindakanName" => $tindakanName[$i],
                "tarifTindakan" => $tarifTindakan[$i],
                "qty" => $qty[$i],
                "discount" => $discount[$i],
                "totalTarif" => $totalTarif[$i],
            ];
        }

        // Create TindakanRawatInap record without dataTindakan
        TindakanRawatInap::create($data);

        foreach ($data['dataTindakan'] as $detail) {
            DetailTindakanRawatInap::create([
                'tindakan_rawat_inap_code' => $data['tindakan_code'],
                'tindakan_code' => $detail['tindakanCode'],
                'tindakan_name' => $detail['tindakanName'],
                'tarif_tindakan' => preg_replace('/\D/', '', $detail['tarifTindakan']),
                'qty' => $detail['qty'],
                'discount' => preg_replace('/\D/', '', $detail['discount']),
                'total_tarif' => preg_replace('/\D/', '', $detail['totalTarif']),
            ]);
        }

        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-rawat-inap');
    }
}

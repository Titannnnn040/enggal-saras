<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use App\Models\Jaminan;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Perawat;
use App\Models\TarifPendaftaran;
use App\Models\RegisterPasien;
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

        return $param . '-' . date('dmy') . $kd;
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
        return view('pages.rawat_inap.data-rawat-inap', ['title' => 'create-rawat-inap', 'pasien' => $pasien, 'rawatInap' => $rawatInap, 'jaminan' => $jaminan, 'layanan' => $layanan, 'dokterAll' => $dokterAll, 'perawat' => $perawat, 'tarifPendaftaran' => $tarifPendaftaran]);
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
        $validatedData['rawat_inap_code'] = $this->generateCode($rawatInap, 'rawat_inap_code', 'RI');
        // echo "<pre>"; print_r($validatedData); die;
        RawatInap::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-rawat-inap');
    }

    /**
     * Display the specified resource.
     */
    public function show(RawatInap $rawatInap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawatInap $rawatInap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RawatInap $rawatInap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RawatInap $rawatInap)
    {
        //
    }
}

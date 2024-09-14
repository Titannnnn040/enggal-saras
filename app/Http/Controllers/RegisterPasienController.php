<?php

namespace App\Http\Controllers;

use App\Models\RegisterPasien;
use App\Models\ReservasiPasien;
use App\Models\Rawat_Jalan;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Jaminan;
use App\Models\PenjadwalanDokter;
use App\Models\Perawat;
use App\Models\TarifPendaftaran;
use App\Models\Rawat_Jalan as Pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterPasienController extends Controller
{
    private function generateRnNumber()
    {
        $lastRnNumber = RegisterPasien::whereDate('created_at', Carbon::today())
        ->where('regist_code', 'like', 'RG-' . date('dmy') . '%')
        ->orderBy('regist_code', 'desc')
        ->first();

        if ($lastRnNumber) {
        $lastNumber = intval(substr($lastRnNumber->regist_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'RG-' . date('dmy') . $kd;
    }
    /**
     * Display a listing of the resource.
     */
    public function indexDataRegistPasien()
    {
        $pasien = Pasien::all();
        $registPasien = RegisterPasien::all();
        $layanan = Layanan::all();
        $reservasiPasien = ReservasiPasien::all();
        $dokter = Dokter::all();

        return view('pages/regist-pasien/data-regist', ['title' => 'data-regist', 'registPasien' => $registPasien, 'pasien' => $pasien, 'layanan' => $layanan, 'reservasiPasien' => $reservasiPasien, 'dokter' => $dokter]);
    }
    public function indexRegistPasien(Request $request, $id)
    {
        $rawatJalan = Rawat_Jalan::all();
        $layanan = Layanan::all();
        $jaminan = Jaminan::all();
        $jadwalDokter = PenjadwalanDokter::all();
        $dokterAll = Dokter::all();
        $perawat = Perawat::all();
        $tarifPendaftaran = DB::table('m_tarif_pendaftaran')->select('code_pendaftaran', 'nama_pendaftaran', 'total_tarif')->get();   

        $reservasi = ReservasiPasien::find($id);
        $layananId = $request->input('layanan_id');

        $dokter = Dokter::where('layanan_id', $layananId)->get();
        // dd($dokterAll);

        return view('pages/regist-pasien/create-regist',  ['title' => 'create-regist', 'tarifPendaftaran' => $tarifPendaftaran, 'perawat' => $perawat, 'rawatJalan' => $rawatJalan, 'layanan' => $layanan, 'dokter' => $dokter, 'jaminan' => $jaminan, 'jadwalDokter' => $jadwalDokter, 'reservasi' => $reservasi, 'dokterAll' => $dokterAll]);
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
        $validatedData = $request->validate([
            'regist_code' => [''],
            'no_antrian' => ['required'],
            'no_rm' => ['required'],
            'pasien_name' => ['required'],
            'jaminan' => ['required'],
            'layanan' => ['required'],
            'dokter' => ['required'],
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
        $validatedData['regist_code'] = $this->generateRnNumber();
        RegisterPasien::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-regist-pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisterPasien $registerPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisterPasien $registerPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisterPasien $registerPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisterPasien $registerPasien)
    {
        //
    }
}

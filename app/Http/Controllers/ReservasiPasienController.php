<?php

namespace App\Http\Controllers;

use App\Models\ReservasiPasien;
use App\Models\Rawat_Jalan;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Jaminan;
use App\Models\PenjadwalanDokter;
use Illuminate\Http\Request;

class ReservasiPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDataReservasi()
    {
        return view('pages/m_reservasi_pasien/data-reservasi', ['title' => 'data-reservasi-pasien']);
    }

    public function getPatientData($noRekamMedis)
    {
        // Cari data pasien berdasarkan nomor rekam medis
        $patient = Rawat_Jalan::where('no_rekam_medis', $noRekamMedis)->first();

        // Periksa apakah data ditemukan
        if ($patient) {
            return response()->json([
                'nama_lengkap' => $patient->nama_lengkap,
                'alamat' => $patient->address,
                'telepon' => $patient->phone_number,
                'jenis_kelamin' => $patient->jenis_kelamin
            ]);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function getDoctorsByLayanan($layananId)
    {
        // Cari dokter berdasarkan layanan_id
        $doctors = Dokter::where('layanan_id', $layananId)->get();
    
        // Kembalikan data dalam format JSON
        return response()->json($doctors);
    }

    public function indexCreateReservasi(Request $request)
    {
        $rawatJalan = Rawat_Jalan::all();
        $layanan = Layanan::all();
        $jaminan = Jaminan::all();
        $jadwalDokter = PenjadwalanDokter::all();

        $layananId = $request->input('layanan_id');

        // Query untuk mendapatkan dokter dengan layanan_id yang cocok
        $dokter = Dokter::where('layanan_id', $layananId)->get();
        return view('pages/m_reservasi_pasien/create-reservasi', ['title' => 'create-reservasi-pasien', 'rawatJalan' => $rawatJalan, 'layanan' => $layanan, 'dokter' => $dokter, 'jaminan' => $jaminan, 'jadwalDokter' => $jadwalDokter]);
    }

    public function storeReservasi(Request $request){
        return $request->all();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservasiPasien $reservasiPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReservasiPasien $reservasiPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservasiPasien $reservasiPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservasiPasien $reservasiPasien)
    {
        //
    }
}

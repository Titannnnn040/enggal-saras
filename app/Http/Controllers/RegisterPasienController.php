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
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function indexDataRegistPasien()
    {
        $registPasien = RegisterPasien::latest();
        $startDate = request('regist_start_date');
        $endDate = request('regist_end_date');
        if ($startDate && $endDate) {
            // Lakukan query dengan rentang tanggal (start date dan end date)
            $registPasien->whereBetween('created_at', [$startDate, $endDate]);
        }
        if (request('regist_code')) {
            $this->filterData('regist_code', $registPasien);
        }elseif(request('no_rm')){
            $this->filterData('no_rm', $registPasien);
        }elseif(request('pasien_name')){
            $this->filterData('pasien_name', $registPasien);
        }elseif(request('layanan_id')){
            $this->filterData('layanan_id', $registPasien);
        }elseif(request('status')){
            $this->filterData('status', $registPasien);
        }elseif(request('jadwal_praktik')){
            $this->filterData('jadwal_praktik', $registPasien);
        }
        $pasien = Pasien::all();
        $layanan = Layanan::all();
        $reservasiPasien = ReservasiPasien::all();
        $dokter = Dokter::all();

        return view('pages/regist-pasien/data-regist', ['title' => 'data-regist', 'registPasien' => $registPasien->get(), 'pasien' => $pasien, 'layanan' => $layanan, 'reservasiPasien' => $reservasiPasien, 'dokter' => $dokter]);
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
    public function store(Request $request){
        $validatedData = $request->validate([
            'regist_code' => [''],
            'no_reservasi' => [''],
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

        $no_reservasi = $request->no_reservasi;
        ReservasiPasien::where('no_reservasi', $no_reservasi)->update([
            'status' => 4
        ]);
        
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
    public function edit(Request $request, $id)
    {
        
        $registerPasien = RegisterPasien::find($id);
        $rawatJalan = Rawat_Jalan::all();
        $layanan = Layanan::all();
        $jaminan = Jaminan::all();
        $jadwalDokter = PenjadwalanDokter::all();
        $dokterAll = Dokter::all();
        $perawat = Perawat::all();
        $tarifPendaftaran = DB::table('m_tarif_pendaftaran')->select('code_pendaftaran', 'nama_pendaftaran', 'total_tarif')->get();   

        $reservasi = ReservasiPasien::where('no_reservasi', $registerPasien->no_reservasi)->first();
        $layananId = $request->input('layanan_id');

        $dokter = Dokter::where('layanan_id', $layananId)->get();
        return view('pages/regist-pasien/edit-regist', ['title' => 'edit-regist', 'registerPasien' => $registerPasien, 'tarifPendaftaran' => $tarifPendaftaran, 'perawat' => $perawat, 'rawatJalan' => $rawatJalan, 'layanan' => $layanan, 'dokter' => $dokter, 'jaminan' => $jaminan, 'jadwalDokter' => $jadwalDokter, 'reservasi' => $reservasi, 'dokterAll' => $dokterAll]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
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

        $registerPasien = RegisterPasien::find($id);
        $registerPasien->update($validatedData);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/pasien/data-regist-pasien');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $registerPasien = RegisterPasien::find($id);
        $registerPasien->delete($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/pasien/data-regist-pasien');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ReservasiPasien;
use App\Models\Rawat_Jalan;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Jaminan;
use App\Models\PenjadwalanDokter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiPasienController extends Controller
{
    private function generateRnNumber()
    {
        $lastRnNumber = ReservasiPasien::whereDate('created_at', Carbon::today())
        ->where('no_reservasi', 'like', 'RN-' . date('dmy') . '%')
        ->orderBy('no_reservasi', 'desc')
        ->first();

        if ($lastRnNumber) {
        $lastNumber = intval(substr($lastRnNumber->no_reservasi, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'RN-' . date('dmy') . $kd;
    }

    public function indexDataReservasi()
    {
        $reservasi = ReservasiPasien::all();
    
        $dokter = Dokter::all();
        return view('pages/m_reservasi_pasien/data-reservasi', ['title' => 'data-reservasi-pasien', 'reservasi' => $reservasi, 'dokter' => $dokter]);
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
        $dokter = Dokter::where('layanan_id', $layananId)->get();
        return view('pages/m_reservasi_pasien/create-reservasi', ['title' => 'create-reservasi-pasien', 'rawatJalan' => $rawatJalan, 'layanan' => $layanan, 'dokter' => $dokter, 'jaminan' => $jaminan, 'jadwalDokter' => $jadwalDokter]);
    }

    public function storeReservasi(Request $request){
        $validatedData = $request->validate([
            'no_reservasi'   => [''],
            'no_rm'          => ['required'],
            'pasien_name'    => ['required'], 
            'address'         => [''], 
            'phone_no'       => [''], 
            'gender'         => [''], 
            'reservasi_date' => ['required'], 
            'time'           => ['required'], 
            'layanan_id'     => ['required'], 
            'dokter_code'    => ['required'],
            'jadwal_praktik' => ['required'],
            'jaminan_id'     => ['required'],
            'status'         => ['']
        ]);

        $validatedData['no_reservasi'] = $this->generateRnNumber();
        $validatedData['status'] = 1;
        reservasiPasien::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-reservasi-pasien');
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
    public function edit(Request $request, $id)
    {
        $rawatJalan = Rawat_Jalan::all();
        $layanan = Layanan::all();
        $jaminan = Jaminan::all();
        $jadwalDokter = PenjadwalanDokter::all();

        $reservasi = ReservasiPasien::find($id);
        $layananId = $request->input('layanan_id');

        $dokter = Dokter::where('layanan_id', $layananId)->get();
        $dokterAll = Dokter::all();

        return view('pages/m_reservasi_pasien/edit-reservasi',  ['title' => 'create-reservasi-pasien', 'rawatJalan' => $rawatJalan, 'layanan' => $layanan, 'dokter' => $dokter, 'jaminan' => $jaminan, 'jadwalDokter' => $jadwalDokter, 'reservasi' => $reservasi, 'dokterAll' => $dokterAll]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_rm'          => ['required'],
            'pasien_name'    => ['required'], 
            'address'        => [''], 
            'phone_no'       => [''], 
            'gender'         => [''], 
            'reservasi_date' => ['required'], 
            'time'           => ['required'], 
            'layanan_id'     => ['required'], 
            'dokter_code'    => ['required'],
            'jadwal_praktik' => ['required'],
            'jaminan_id'     => ['required'],
        ]);
        $reservasi = reservasiPasien::find($id);
        $reservasi->update([
            'no_rm'          => $request->no_rm,
            'pasien_name'    => $request->pasien_name,
            'address'        => $request->address,
            'phone_no'       => $request->phone_no,
            'gender'         => $request->gender,
            'reservasi_date' => $request->reservasi_date,
            'time'           => $request->time,
            'layanan_id'     => $request->layanan_id,
            'dokter_code'    => $request->dokter_code,
            'jadwal_praktik' => $request->jadwal_praktik,
            'jaminan_id'     => $request->jaminan_id
        ]);
        $request->session()->flash('success', 'Data berhasil diubah');
        return redirect('/pasien/data-reservasi-pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $reservasi = ReservasiPasien::find($id);
        $reservasi->delete($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/pasien/data-reservasi-pasien');
    }

    public function updateStatus(Request $request, $id){
        $reservasi = ReservasiPasien::find($id);
        if($reservasi->status == 1){
            $reservasi->update(['status' => 2]);
            $request->session()->flash('success', 'Berhasil, Reservasi berstatus Register');
        }elseif($reservasi->status == 2){
            $reservasi->update(['status' => 3]);
            $request->session()->flash('success', 'Berhasil, Reservasi berstatus Skip');
        }elseif($reservasi->status == 3){
            $reservasi->update(['status' => 2]);
            $request->session()->flash('success', 'Berhasil, Reservasi berstatus Register');
        }
        return redirect('/pasien/data-reservasi-pasien');
    }
}

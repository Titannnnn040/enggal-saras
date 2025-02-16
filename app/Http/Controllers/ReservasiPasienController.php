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
use Illuminate\Support\Facades\DB;

class ReservasiPasienController extends Controller
{
    private function generateRnNumber(){
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
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function indexDataReservasi(){
        $reservasi = ReservasiPasien::latest();
        $startDate = request('reservasi_start_date');
        $endDate = request('reservasi_end_date');
        if ($startDate && $endDate) {
            // Lakukan query dengan rentang tanggal (start date dan end date)
            $reservasi->whereBetween('reservasi_date', [$startDate, $endDate]);
        }
        if (request('no_reservasi')) {
            $this->filterData('no_reservasi', $reservasi);
        }elseif(request('no_rm')){
            $this->filterData('no_rm', $reservasi);
        }elseif(request('pasien_name')){
            $this->filterData('pasien_name', $reservasi);
        }elseif(request('layanan_id')){
            $this->filterData('layanan_id', $reservasi);
        }elseif(request('jadwal_praktik')){
            $this->filterData('jadwal_praktik', $reservasi);
        }
        $reservasiPasien = ReservasiPasien::all();
        $dokter = Dokter::all();
        $layanan = Layanan::all();
        $data = [
            'title' => 'data-reservasi-pasien',
            'reservasi' => $reservasi->get(),
            'dokter' => $dokter,
            'reservasiPasien' => $reservasiPasien,
            'layanan' => $layanan
        ];
        // echo"<pre>";print_r($data['layanan']);die();
        return view('pages.reservasi_pasien.data-reservasi', $data);
    }
    public function getPatientData($noRekamMedis){
        $patient = Rawat_Jalan::where('no_rekam_medis', $noRekamMedis)->first();
        if ($patient) {
            return response()->json([
                'nama_lengkap' => $patient->nama_lengkap,
                'alamat' => $patient->address,
                'telepon' => $patient->phone_number,
                'jenis_kelamin' => $patient->jenis_kelamin,
                'no_bpjs' => $patient->no_bpjs_asuransi
            ]);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
    public function getDoctorsByLayanan($layananId){
        $doctors = Dokter::where('layanan_id', $layananId)->get();
        return response()->json($doctors);
    }
    public function indexCreateReservasi(Request $request){
        $rawatJalan = Rawat_Jalan::all();
        $layanan = Layanan::all();
        $jaminan = Jaminan::all();
        $jadwalDokter = PenjadwalanDokter::all();

        $layananId = $request->input('layanan_id');
        $dokter = Dokter::where('layanan_id', $layananId)->get();
        $data = [
            'title' => 'create-reservasi-pasien',
            'rawatJalan' => $rawatJalan,
            'layanan' => $layanan,
            'dokter' => $dokter,
            'jaminan' => $jaminan,
            'jadwalDokter' => $jadwalDokter
        ];
        return view('pages.reservasi_pasien.create-reservasi', $data);
    }
    public function getQueue($requestParam, $input, $parameter, $table, $output1, $output2){
        $request = request()->get($requestParam);
        $prefix = $request === $input ? $output1 : $output2;
        $count = DB::table($table)
                    ->where($parameter, $request)
                    ->count();
        $value = $prefix . '-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        return $value;
    }
    public function storeReservasi(Request $request){
        $antrian = $request->input('jadwal_praktik');
        $table = 'm_reservasi_pasien';
        $parameter = 'jadwal_praktik';
        $validatedData = $request->validate([
            'no_reservasi'   => [''],
            'no_rm'          => ['required'],
            'pasien_name'    => ['required'], 
            'no_bpjs'    => [''], 
            'address'        => [''], 
            'phone_no'       => [''], 
            'gender'         => [''], 
            'no_bpjs'        => [''], 
            'reservasi_date' => ['required'], 
            'time'           => ['required'], 
            'layanan_id'     => ['required'], 
            'dokter_code'    => ['required'],
            'jadwal_praktik' => ['required'],
            'jaminan_id'     => ['required'],
            'status'         => [''],
            'no_antrian'     => ['']
        ]);

        $validatedData['no_reservasi'] = $this->generateRnNumber();
        $validatedData['status'] = 1;
        $validatedData['no_antrian'] = $this->getQueue('jadwal_praktik', 'PAGI', $parameter, $table, 'P', 'S');
        ReservasiPasien::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-reservasi-pasien');
    }
    public function edit(Request $request, $id){
        $rawatJalan = Rawat_Jalan::all();
        $layanan = Layanan::all();
        $jaminan = Jaminan::all();
        $jadwalDokter = PenjadwalanDokter::all();

        $reservasi = ReservasiPasien::find($id);
        $layananId = $request->input('layanan_id');

        $dokter = Dokter::where('layanan_id', $layananId)->get();
        $dokterAll = Dokter::all();

        return view('pages.reservasi_pasien.edit-reservasi',  ['title' => 'create-reservasi-pasien', 'rawatJalan' => $rawatJalan, 'layanan' => $layanan, 'dokter' => $dokter, 'jaminan' => $jaminan, 'jadwalDokter' => $jadwalDokter, 'reservasi' => $reservasi, 'dokterAll' => $dokterAll]);
    }
    public function update(Request $request, $id){
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
    public function destroy(Request $request, $id){
        $reservasi = ReservasiPasien::find($id);
        $reservasi->delete($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/pasien/data-reservasi-pasien');
    }
    public function updateStatus(Request $request, $id){
        $reservasi = ReservasiPasien::find($id);
        if($reservasi->status == 1){
            $reservasi->update(['status' => 2]);
            $request->session()->flash('success', 'Berhasil, Reservasi berstatus Confirm');
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

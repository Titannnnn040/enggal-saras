<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Rawat_Jalan;
use App\Models\RegistrasiPasienLuar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrasiPasienLuarController extends Controller
{
    private function generateRnNumber()
    {
        $lastRnNumber = RegistrasiPasienLuar::whereDate('created_at', Carbon::today())
        ->where('regist_code', 'like', 'RL-' . date('dmy') . '%')
        ->orderBy('regist_code', 'desc')
        ->first();

        if ($lastRnNumber) {
        $lastNumber = intval(substr($lastRnNumber->regist_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'RL-' . date('dmy') . $kd;
    }
    public function indexData(){
       
        $startDate = request('created_date');
        $endDate = request('end_date');

        $query = RegistrasiPasienLuar::query();

        if ($startDate && $endDate) {
            // Pastikan format tanggal valid sebelum melakukan filter
            $query->whereBetween('created_at', [Carbon::parse($startDate)->startOfDay(), Carbon::parse($endDate)->endOfDay()]);
        }

        $data = [
            'registPasien' => $query->latest()->get(),
            'layanan' => Layanan::all(),
            'dokter' => Dokter::all(),
            'patient' => Rawat_Jalan::all()
        ];

        $title = 'data-regist-pasien-luar';
        return view('pages.regist-pasien-luar.data-regist', compact('data', 'title'));
    }
    public function getDataDoctor(Request $request){
        $layananId = $request->layanan_id;
        $data =  Dokter::where('layanan_id', $layananId)->get();
        return response()->json($data);
    }
    public function getDataPatient(Request $request){
        $id = $request->id;
        $data =  Rawat_Jalan::where('id', $id)->get();
        return response()->json($data);
    }
    public function indexCreate(){
        $data = [
            'layanan' => Layanan::all(),
            'patient' => Rawat_Jalan::all()
        ];
        $title = 'create-regist-pasien-luar'; 
        return view('pages.regist-pasien-luar.create-regist', compact('data', 'title'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'patient'   => ['required'],
            'address'   => ['required'],
            'dob'       => ['required'],
            'jaminan'   => ['required'],
            'layanan'   => ['required'],
            'dokter'    => ['required'],
        ]);
        $validatedData['regist_code'] = $this->generateRnNumber();

        $create = RegistrasiPasienLuar::create($validatedData);
        if($create){
            $request->session()->flash('success', 'Data berhasil dirubah');
            return redirect()->route('data-registrasi-pasien-luar');
        }else{
            $request->session()->flash('error', 'Data gagal dirubah');
            return redirect()->route('data-registrasi-pasien-luar');
        }
    }
    public function edit(Request $request, $id){
        $data = [
            'registPasien' => RegistrasiPasienLuar::find($id),
            'layanan' => Layanan::all(),
            'dokter' => Dokter::all(),
            'patient' => Rawat_Jalan::all()
        ];
        $title = 'edit-regist-pasien-luar';
        return view('pages.regist-pasien-luar.edit-regist', compact('data', 'title'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'patient'   => ['required'],
            'address'   => ['required'],
            'dob'       => ['required'],
            'jaminan'   => ['required'],
            'layanan'   => ['required'],
            'dokter'    => ['required'],
        ]);
        $validatedData['updated_at'] = Carbon::now();
        $update = RegistrasiPasienLuar::where('id', $id)->update($validatedData);
        if($update){
            $request->session()->flash('success', 'Data berhasil dirubah');
            return redirect()->route('data-registrasi-pasien-luar');
        }else{
            $request->session()->flash('error', 'Data gagal dirubah');
            return redirect()->route('data-registrasi-pasien-luar');
        }
    }
    public function destroy(Request $request, $id){
        $delete = RegistrasiPasienLuar::where('id', $id)->delete();
        if($delete){
            $request->session()->flash('success', 'Data berhasil dihapus');
            return redirect()->route('data-registrasi-pasien-luar');
        }else{
            $request->session()->flash('error', 'Data gagal dihapus');
            return redirect()->route('data-registrasi-pasien-luar');
        }
    }
}

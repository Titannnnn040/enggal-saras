<?php

namespace App\Http\Controllers;

use App\Models\Rawat_Jalan;
use App\Models\Layanan;
use App\Models\TracerRekamMedis;
use App\Models\Dokter;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TracerRekamMedisController extends Controller
{
    private function generateRnNumber()
    {
        $lastRnNumber = TracerRekamMedis::whereDate('created_at', Carbon::today())
        ->where('tracer_code', 'like', 'TR-' . date('dmy') . '%')
        ->orderBy('tracer_code', 'desc')
        ->first();

        if ($lastRnNumber) {
        $lastNumber = intval(substr($lastRnNumber->tracer_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'TR-' . date('dmy') . $kd;
    }
    public function indexData(){
        $title = 'tracer-rekam-medis';
        $data = [
            'dataTracer' => TracerRekamMedis::all(),
            'dataPasien' => Rawat_Jalan::all(),
            'dataLayanan' => Layanan::all(),
            'dataDokter' => Dokter::all(),
        ];
        return view('pages.pendaftaran.tracer-rekam-medis.data', compact('title', 'data'));
    }

    public function indexCreate(){
        $data = [
            'dataPasien' => Rawat_Jalan::all(),
            'dataLayanan' => Layanan::all(),
            'dataDokter' => Dokter::all(),
        ];
        $title = 'create-tracer-rekam-medis';
        return view('pages.pendaftaran.tracer-rekam-medis.create', compact('title', 'data'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'patient'           => ['required'],
            'pinjam'            => ['required'],
            'penanggung_jawab'  => ['required'],
            'date_now'          => [],
            'time_now'          => [],
            'dokter'            => ['required']
        ],[
            'pinjam.required' => 'Di Pinjamkan is required',
            'penanggung_jawab.required' => 'Penanggung Jawab is required'
        ]);
        $data = [
            'tracer_code'       => $this->generateRnNumber(),
            'patient'           => $validated['patient'],
            'pinjam'            => $validated['pinjam'],
            'penanggung_jawab'  => $validated['penanggung_jawab'],
            'date'              => $validated['date_now'],
            'time'              => $validated['time_now'],
            'dokter'            => $validated['dokter'],
            'status'            => 1,
        ];
        $create = TracerRekamMedis::create($data);
        if($create){
            $request->session()->flash('success', 'Data berhasil dirubah');
            return redirect()->route('data-tracer-rekam-medis');
        }else{
            $request->session()->flash('error', 'Data gagal dirubah');
            return redirect()->route('data-tracer-rekam-medis');
        }
    }
    public function edit($code){
        $data = [
            'dataTracer' => TracerRekamMedis::where('tracer_code', $code)->first(),
            'dataPasien' => Rawat_Jalan::all(),
            'dataLayanan' => Layanan::all(),
            'dataDokter' => Dokter::all(),
        ];
        // echo"<pre>";print_r($data['dataTracer']);die();
        $title = 'edit-tracer-rekam-medis';
        return view('pages.pendaftaran.tracer-rekam-medis.edit', compact('title', 'data'));
    }
    public function update(Request $request, $code){
        $validated = $request->validate([
            'patient'           => ['required'],
            'pinjam'            => ['required'],
            'penanggung_jawab'  => ['required'],
            'date_now'          => [],
            'time_now'          => [],
            'dokter'            => ['required']
        ],[
            'pinjam.required' => 'Di Pinjamkan is required',
            'penanggung_jawab.required' => 'Penanggung Jawab is required'
        ]);
        $data = [
            'patient'           => $validated['patient'],
            'pinjam'            => $validated['pinjam'],
            'penanggung_jawab'  => $validated['penanggung_jawab'],
            'date'              => $validated['date_now'],
            'time'              => $validated['time_now'],
            'dokter'            => $validated['dokter'],
        ];
        $tracerRekamMedis = TracerRekamMedis::where('tracer_code', $code)->first();
        $update = $tracerRekamMedis->update($data);
        if($update){
            $request->session()->flash('success', 'Data berhasil dirubah');
            return redirect()->route('data-tracer-rekam-medis');
        }else{
            $request->session()->flash('error', 'Data gagal dirubah');
            return redirect()->route('data-tracer-rekam-medis');
        }
    }
    public function destroy(Request $request, $code){
        $delete = TracerRekamMedis::where('tracer_code', $code)->delete();
        if($delete){
            $request->session()->flash('success', 'Data berhasil dihapus');
            return redirect()->route('data-tracer-rekam-medis');
        }else{
            $request->session()->flash('error', 'Data gagal dihapus');
            return redirect()->route('data-tracer-rekam-medis');
        }
    }
    public function updateStatus(Request $request, $code){
        $update = TracerRekamMedis::where('tracer_code', $code)->update([
            'status' => 2,
            'update_status' => date('Y-m-d H:i')
        ]);
        if($update){
            $request->session()->flash('success', 'Data berhasil diupdate');
            return redirect()->route('data-tracer-rekam-medis');
        }else{
            $request->session()->flash('error', 'Data gagal diupdate');
            return redirect()->route('data-tracer-rekam-medis');
        }
    }
}

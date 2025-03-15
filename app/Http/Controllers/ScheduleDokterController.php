<?php

namespace App\Http\Controllers;

use App\Models\PenjadwalanDokter;
use App\Models\Layanan;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleDokterController extends Controller
{
    public function getJadwal($dokter_id, $layanan_id){
        $jadwal = PenjadwalanDokter::where('dokter_id', $dokter_id)
                                    ->where('layanan_id', $layanan_id)
                                    ->first();
        return response()->json($jadwal);
    }
    public function filterData($field, $model){
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function filterDataUnique($field, $model){
        if (request($field)) {
            $model->where($field, request($field));
        }
    }
    public function indexData(){
        $jadwalDokter = PenjadwalanDokter::latest();

        if(request('nama_lengkap')) {
            $this->filterData('nama_lengkap', $dokter);
        }
        return view('pages.dokter.jadwal_dokter.jadwal-dokter', ['title' => 'jadwal-dokter', 'jadwalDokter' => $jadwalDokter->get()]);
    }
    public function indexCreate(){
        $layanan = Layanan::all();
        $dokter = Dokter::all();
        $jadwals = PenjadwalanDokter::all();
        return view('pages.dokter.jadwal_dokter.create-jadwal-dokter', ['title' => 'create-jadwal-dokter', 'layanan' => $layanan, 'dokter' => $dokter, 'jadwals' => $jadwals]);
    }
    public function store(Request $request){
        // return $request->all();die();
        $validatedData = $request->validate([
            'layanan_id'     => ['required'],
            'dokter_id'      => ['required'],
            'jadwal_praktik' => ['required'],
            // 'start  '          => ['required'],
            // 'finish'         => ['required']
        ]);
    
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        $data = [];
        foreach ($days as $day) {
            $start = $request->input($day . '_start');
            $finish = $request->input($day . '_finish');
            // echo"<pre>";print_r($start);die;
            $data[$day] = $request->has($day) ? $start . '-' . $finish : '';
        }
        $validatedData = array_merge($validatedData, $data);
        // echo"<pre>";print_r($validatedData);die;
        PenjadwalanDokter::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tenaga-medis/jadwal-dokter');
    }
    public function edit($id){
        $layanan = Layanan::all();
        $dokter = Dokter::all();
        $penjadwalanDokter = PenjadwalanDokter::find($id);
        // echo"<pre>";print_r($penjadwalanDokter);die;    
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        $scheduleDoctor = [];
        foreach ($days as $day) {
            $time = explode('-', $penjadwalanDokter->$day);
            $start = $time[0] ?? '';
            $finish = $time[1] ?? '';
            $scheduleDoctor[$day . '_start'] = $start;
            $scheduleDoctor[$day . '_finish'] = $finish;
        }

        $data = [
            'id'             => $penjadwalanDokter->id,
            'layanan_id'     => $penjadwalanDokter->layanan_id,
            'dokter_id'      => $penjadwalanDokter->dokter_id,
            'jadwal_praktik' => $penjadwalanDokter->jadwal_praktik,
        ];
        
        $data = array_merge($data, $scheduleDoctor);
        // echo"<pre>";print_r($data);die;
        return view('pages.dokter.jadwal_dokter.edit-jadwal-dokter', ['title' => 'edit-jadwal-dokter', 'layanan' => $layanan, 'dokter' => $dokter, 'data' => $data]);
    }
    public function update(Request $request, $id){
        // echo"<pre>";print_r($request->all());die;
        $validatedData = $request->validate([
            'layanan_id'     => ['required'],
            'dokter_id'      => ['required'],
            'jadwal_praktik' => ['required'],
        ]);
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        $data = [];
        foreach ($days as $day) {
            $start = $request->input($day . '_start');
            $finish = $request->input($day . '_finish');
            $data[$day] = $request->has($day) ? $start . '-' . $finish : '';
        }
        $validatedData = array_merge($validatedData, $data);
        // echo"<pre>";print_r($validatedData);die;

        $penjadwalanDokter = PenjadwalanDokter::find($id);
        $penjadwalanDokter->update($validatedData);

        if($penjadwalanDokter){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/tenaga-medis/jadwal-dokter');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/tenaga-medis/jadwal-dokter');
        }
    }
    public function destroy(Request $request, $id){
        $penjadwalanDokter = PenjadwalanDOkter::find($id);
        $penjadwalanDokter->destroy($id);
        if($penjadwalanDokter){
            $request->session()->flash('success','Data berhasil di hapus');
            return redirect('/tenaga-medis/jadwal-dokter');
        }else{
            $request->session()->flash('failed','Data Gagal di hapus');
        return redirect('/tenaga-medis/jadwal-dokter');
        }
    }
}

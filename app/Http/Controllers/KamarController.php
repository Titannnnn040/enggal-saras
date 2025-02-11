<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KamarController extends Controller

{
    private function generateTmNumber()
    {
        $lastTmNumber = Kamar::whereDate('created_at', Carbon::today())
                            ->where('kode_kamar', 'like', 'KM-' . date('dmy') . '%')
                            ->orderBy('kode_kamar', 'desc')
                            ->first();
        if ($lastTmNumber) {
            $lastNumber = intval(substr($lastTmNumber->kode_kamar, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        return 'KM-' . date('dmy') . $kd;
    }
    public function indexCreate()
    {
        return view('pages/kamar/create-kamar', ['title' => 'create-kamar']);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'kode_kamar'  => [],
            'nama_kamar'  => ['required'],
            'jenis_kamar' => ['required'],
            'jumlah_bed'  => [],
            'status'      => []
        ]);
        
        $validatedData['kode_kamar'] = $this->generateTmNumber();
        if($request['status'] == ''){
            $validatedData['status'] = 'tidak aktif';
        }
        if($request['jumlah_bed'] == NULL){
            $validatedData['jumlah_bed'] = '0';
        }

        Kamar::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/kamar/data-kamar');
    }
    public function indexData(Request $request)
    {
        $kamar = Kamar::latest();
        if(request('kode_kamar')){
            $kamar->where('kode_kamar', 'like', '%' . request('kode_kamar') . '%');
        }
        if(request('nama_kamar')){
            $kamar->where('nama_kamar', 'like', '%' . request('nama_kamar') . '%');
        }
        return view('pages/kamar/data-kamar', ['title' => 'data-kamar', 'kamar' => $kamar->get()]);
    }
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('pages/kamar/edit-kamar', ['title' => 'edit-kamar', 'kamar' => $kamar]);
    }
    public function update(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'kode_kamar'  => [],
            'nama_kamar'  => ['required'],
            'jenis_kamar' => ['required'],
            'jumlah_bed'  => [],
            'status'      => []
        ]);
        $validatedData['kode_kamar'] = $this->generateTmNumber();
        if($request['status'] == ''){
            $request['status'] = 'tidak aktif';
        }
        $kamar = Kamar::find($id);
        $kamar->update([
            'nama_kamar'  => $request->nama_kamar,
            'jenis_kamar' => $request->jenis_kamar,
            'status'      => $request->status
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/kamar/data-kamar');
    }
    public function destroy(Request $request, $id)
    {
        $kamar = Kamar::find($id);

        $kamar->destroy($id);
        $request->session()->flash('success', 'Data berhasil di hapus');
        return redirect('/kamar/data-kamar');
    }
}

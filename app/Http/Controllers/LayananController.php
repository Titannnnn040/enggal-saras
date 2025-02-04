<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    private function generateLmNumber(){
        $count = Layanan::all('id')->count();
        $count = $count + 1;
        $kd = str_pad($count, 5, '0', STR_PAD_LEFT);
        return 'LM' . '-' . $kd;
    }
    public function indexData(Request $request){
        $layanan = Layanan::latest();
        if(request('kode_layanan')){
            $layanan->where('kode_layanan', 'like', '%' . request('kode_layanan') . '%');
        } 
        if(request('nama_layanan')){
            $layanan->where('nama_layanan', 'like', '%' . request('nama_layanan') . '%');
        } 
        return view('pages.layanan.data-layanan', ['layanan' => $layanan->get(),'title' => 'data-layanan']);
    }
    public function indexCreate(Request $request){
        return view('pages.layanan.create-layanan', ['title' => 'create-layanan']);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_layanan'      => ['required'],
            'jenis_layanan'     => ['required'],
            'kode_layanan_bpjs' => ['numeric', 'digits_between:13,15'],
            'medical_checkup'   => [],
            'ibu_hamil'         => []
        ]);
        $validatedData['kode_layanan'] = $this->generateLmNumber();
        Layanan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/layanan/data-layanan');
    }
    public function edit(Request $request, $id){
        $layanan = Layanan::find($id);
        return view('pages.layanan.edit-layanan', ['title' => 'edit-layanan', 'layanan' => $layanan]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama_layanan'      => ['required'],
            'jenis_layanan'     => ['required'],
            'kode_layanan_bpjs' => ['numeric', 'digits_between:13,15'],
            'medical_checkup'   => [],
            'ibu_hamil'         => []
        ]);
        $layanan = Layanan::find($id);
        $layanan->update([
            'nama_layanan'      => $request->nama_layanan,
            'jenis_layanan'     => $request->jenis_layanan,
            'kode_layanan_bpjs' => $request->kode_layanan_bpjs,
            'medical_checkup'   => $request->medical_checkup,
            'ibu_hamil'         => $request->ibu_hamil,
        ]);
        if($layanan){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/layanan/data-layanan');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/layanan/data-layanan');
        }
    }
    public function destroy(Request $request, $id){   
        $layanan = Layanan::find($id);
        $layanan->delete($id);
        if($layanan){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/layanan/data-layanan');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/layanan/data-layanan');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawat;
use Illuminate\Validation\Rule;

class DataPerawatController extends Controller
{
    public function store(Request $request){
        $perawat = Perawat::latest();

        if(request('nama_lengkap')){
            $perawat->where('nama_lengkap', 'like', '%' . request('nama_lengkap') . '%');
        }
        if(request('nik')){
            $perawat->where('nik', 'like', request('nik'));
        }

        return view('m_perawat/data-perawat', ['title' => 'data-perawat', 'perawat' => $perawat->get()]);
    }

    public function edit($id){
        $findPerawat = Perawat::find($id);
        return view('m_perawat/edit-perawat', ['perawat' => $findPerawat, 'title' => 'edit-perawat']);

    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_lengkap' => ['required', 'max:255'],
            'nik'          => ['required', 'numeric', 'digits_between:3,20', Rule::unique('m_perawat', 'nik')->ignore($id)]
        ]);
        $findPerawat = Perawat::find($id);
        $findPerawat->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik
        ]);
        
        if($findPerawat){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/perawat/data-perawat');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/perawat/data-perawat');
        }
    }

    public function destroy(Request $request, $id){
        $findPerawat = Perawat::find($id);
        $findPerawat->delete($id);
        if($findPerawat){
            $request->session()->flash('success','Data berhasil di hapus');
            return redirect('/perawat/data-perawat');
        }else{
            $request->session()->flash('failed','Data Gagal di hapus');
            return redirect('/perawat/data-perawat');
        }
    }
}

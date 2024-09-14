<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawat;
use App\Http\Requests\StorePerawatRequest;
use App\Http\Requests\UpdatePerawatRequest;
use Carbon\Carbon;

class PerawatController extends Controller
{
    private function generatePnNumber()
    {
        $lastTmNumber = Perawat::whereDate('created_at', Carbon::today())
        ->where('perawat_code', 'like', 'PN-' . date('dmy') . '%')
        ->orderBy('perawat_code', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->perawat_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'PN-' . date('dmy') . $kd;
    }
    public function indexData(Request $request){
        $perawat = Perawat::latest();

        if(request('nama_lengkap')){
            $perawat->where('nama_lengkap', 'like', '%' . request('nama_lengkap') . '%');
        }
        if(request('nik')){
            $perawat->where('nik', 'like', request('nik'));
        }

        return view('m_perawat/data-perawat', ['title' => 'data-perawat', 'perawat' => $perawat->get()]);
    }
    public function indexCreate()
    {
        return view('m_perawat/create-perawat', ['title' => 'create-perawat']);
    }
    public function store(Request $request)
    {
        // return $request->all();
        // die;
        $validatedData = $request->validate([
            'perawat_code' => [],
            'nama_lengkap' => ['required', 'max:255'],
            'nik'          => ['required', 'max:255', 'unique:m_perawat,nik'],
        ]);
        $validatedData['perawat_code'] = $this->generatePnNumber();
        Perawat::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/perawat/data-perawat');
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

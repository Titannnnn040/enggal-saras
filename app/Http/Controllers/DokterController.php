<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DokterController extends Controller
{
    private function generateTmNumber()
    {
        $lastTmNumber = Dokter::whereDate('created_at', Carbon::today())
        ->where('no_dokter', 'like', 'TM-' . date('dmy') . '%')
        ->orderBy('no_dokter', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->no_dokter, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'TM-' . date('dmy') . $kd;
    }
    public function filterData($field, $model, $unique){
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function filterDataUnique($field, $model){
        if (request($field)) {
            $model->where($field, request($field));
        }
    }
    public function indexData(Request $request){   
        $dokter = Dokter::latest();

        if (request('no_dokter')) {
            $this->filterDataUnique('no_dokter', $dokter);
        }
        if(request('nama_lengkap')) {
            $this->filterData('nama_lengkap', $dokter);
        }
        // $layanan = Layanan::all();
        return view('pages.dokter.data_dokter.data-dokter', ['title' => 'data-dokter', 'dokter' => $dokter->get()]);
    }
    public function indexCreate(Request $request){   
        $layanan = Layanan::all();
        return view('pages.dokter.data_dokter.create-dokter', ['title' => 'create-dokter', 'layanan' => $layanan]);
    }
    public function create(Request $request){   
        $validatedDokter = $request->validate([
            'no_dokter'     => [''],
            'nama_lengkap'  => ['required', 'max:255'],
            'code_bpjs'     => ['required', 'numeric', 'digits_between:12,15', 'unique:m_dokter,code_bpjs'],
            'sip'           => ['required', 'numeric', 'digits_between:12,15'],
            'str'           => ['required', 'numeric', 'digits_between:12,15'],
            'end_date_sip'  => ['required'],
            'end_date_str'  => ['required'],
            'layanan_id'    => ['required'],
            'status'        => ['required'],
            'nik_dokter'    => ['required', 'digits_between:12,15', 'unique:m_dokter,nik_dokter'],
            'id_dokter'     => [],
            'nama_petugas'  => [],
            'username_icare'  => [],
            'password_icare'  => [],
        ]);
        $validatedDokter['no_dokter'] = $this->generateTmNumber();
        $validatedDokter['password_icare'] = bcrypt($request->password_icare);

        Dokter::create($validatedDokter);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tenaga-medis/data-tenaga-medis');
    }
    public function edit($id){
        $dokter = Dokter::find($id);
        $layanan = Layanan::all();
        return view('pages.dokter.data_dokter.edit-dokter', compact('dokter', 'layanan'), ['title' => 'edit-dokter']);
    }
    public function update(Request $request,$id){
        $request->validate([
            'nama_lengkap'  => ['required', 'max:255'],
            'code_bpjs'     => ['required', 'numeric', 'digits_between:12,15', Rule::unique('m_dokter', 'code_bpjs')->ignore($id)],
            'sip'           => ['required', 'numeric', 'digits_between:12,15'],
            'str'           => ['required', 'numeric', 'digits_between:12,15'],
            'end_date_sip'  => ['required'],
            'end_date_str'  => ['required'],
            'layanan_id'    => ['required'],
            'status'        => ['required'],
            'nik_dokter'    => ['required', 'digits_between:12,15',  Rule::unique('m_dokter', 'nik_dokter')->ignore($id)],
            'id_dokter'     => [],
            'nama_petugas'  => [],
            'username_icare'  => [],
            'password_icare'  => [],
        ]);
        $dokter = Dokter::find($id);
        $dokter->update([
            'nama_lengkap'  => $request->nama_lengkap,
            'code_bpjs'     => $request->code_bpjs,
            'sip'           => $request->sip,
            'str'           => $request->str,
            'end_date_sip'  => $request->end_date_sip,
            'end_date_str'  => $request->end_date_str,
            'layanan_id'    => $request->layanan_id,
            'status'        => $request->status,
            'nik_dokter'    => $request->nik_dokter,
            'id_dokter'     => $request->id_dokter,
            'nama_petugas'  => $request->nama_petugas,   
            'username_icare'  => $request->username_icare,   
            'password_icare'  => bcrypt($request->password_icare)   
        ]);  
        if($dokter){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/tenaga-medis/data-tenaga-medis');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/tenaga-medis/data-tenaga-medis');
        }
    }
    public function destroy(Request $request, $id){
        $dokter = Dokter::find($id);
        $dokter->delete($id);
        if($dokter){
            $request->session()->flash('success','Data berhasil di hapus');
            return redirect('/tenaga-medis/data-tenaga-medis')->with('success-deleted', 'Data Petugas Medis Berhasil dihapus');
        } else {
            $request->session()->flash('failed','Data Gagal di hapus');
            return redirect('/tenaga-medis/data-tenaga-medis')->with('error-deleted', 'Data Petugas Medis Gagal Dihapus');
        }
    }
}

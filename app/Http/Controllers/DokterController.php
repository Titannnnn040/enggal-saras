<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    private function generateTmNumber()
    {
        $lastTmNumber = Dokter::whereDate('created_at', Carbon::today())
        ->where('no_dokter', 'like', 'KM-' . date('dmy') . '%')
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        $validatedDokter = $request->validate([
            'no_dokter'     => [''],
            'nama_lengkap'  => ['required', 'max:255'],
            'code_bpjs'     => ['required', 'numeric', 'digits_between:12,15'],
            'sip'           => ['required', 'numeric', 'digits_between:12,15'],
            'end_date'      => ['required'],
            'layanan_id'       => ['required'],
            'status'        => ['required'],
            'nik_dokter'    => ['required', 'digits_between:12,15'],
            'id_dokter'     => [],
            'nama_petugas'  => []
        ]);
        $validatedDokter['no_dokter']=$this->generateTmNumber();

        Dokter::create($validatedDokter);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tenaga-medis/data-tenaga-medis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $layanan = Layanan::all();
        return view('m_dokter/create-dokter', ['title' => 'create-dokter', 'layanan' => $layanan]);
    }
    public function storeData(Request $request)
    {   
        $dokter = Dokter::all();
        // $layanan = Layanan::all();
        return view('m_dokter/data-dokter', ['title' => 'data-dokter', 'dokter' => $dokter]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dokter = Dokter::find($id);
        $layanan = Layanan::all();
        return view('m_dokter/edit-dokter', compact('dokter', 'layanan'), ['title' => 'edit-dokter']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'no_dokter'     => [''],
            'nama_lengkap'  => ['required', 'max:255'],
            'code_bpjs'     => ['required', 'numeric', 'digits_between:12,15'],
            'sip'           => ['required', 'numeric', 'digits_between:12,15'],
            'end_date'      => ['required'],
            'layanan_id'       => ['required'],
            'status'        => ['required'],
            'nik_dokter'    => ['required', 'digits_between:12,15'],
            'id_dokter'     => [],
            'nama_petugas'  => []
        ]);
        $dokter = Dokter::find($id);
        $dokter->update([
            'nama_lengkap'  => $request->nama_lengkap,
            'code_bpjs'     => $request->code_bpjs,
            'sip'           => $request->sip,
            'end_date'      => $request->end_date,
            'layanan_id'    => $request->layanan_id,
            'status'        => $request->status,
            'nik_dokter'    => $request->nik_dokter,
            'id_dokter'     => $request->id_dokter,
            'nama_petugas'  => $request->nama_petugas      
        ]);  
        if($dokter){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/tenaga-medis/data-tenaga-medis');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/tenaga-medis/data-tenaga-medis');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
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

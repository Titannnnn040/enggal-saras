<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    private function generateLmNumber()
    {
        $count = Layanan::all('id')->count();

        $count = $count + 1;
        $kd = str_pad($count, 5, '0', STR_PAD_LEFT);

        return 'LM' . '-' . $kd;
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
        // return $request->all();
        // die;
        $validatedData = $request->validate([
            'nama_layanan'      => ['required'],
            'jenis_layanan_id'  => ['required'],
            'kode_layanan_bpjs' => ['numeric', 'digits_between:13,15'],
            'medical_checkup'   => [],
            'ibu_hamil'         => []
        ]);
        $validatedData['kode_layanan'] = $this->generateLmNumber();
        Layanan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/layanan/data-layanan');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $layanan = Layanan::all();
        $jenisLayanan = JenisLayanan::all();
        return view('m_layanan/create-layanan', ['jenisLayanan' => $jenisLayanan,'title' => 'create-layanan']);
    }

    public function storeData(Request $request)
    {
        $layanan = Layanan::latest();
        if(request('kode_layanan')){
            $layanan->where('kode_layanan', 'like', '%' . request('kode_layanan') . '%');
        } 
        if(request('nama_layanan')){
            $layanan->where('nama_layanan', 'like', '%' . request('nama_layanan') . '%');
        } 
        $jenisLayanan = JenisLayanan::all();
        return view('m_layanan/data-layanan', ['layanan' => $layanan->get(),'title' => 'data-layanan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $jenisLayanan = JenisLayanan::all();
        $layanan = Layanan::find($id);
        return view('m_layanan/edit-layanan', ['jenisLayanan' => $jenisLayanan, 'title' => 'edit-layanan', 'layanan' => $layanan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan'      => ['required'],
            'jenis_layanan_id'  => ['required'],
            'kode_layanan_bpjs' => ['numeric', 'digits_between:13,15'],
            'medical_checkup'   => [],
            'ibu_hamil'         => []
        ]);
        $layanan = Layanan::find($id);
        $layanan->update([
            'nama_layanan'      => $request->nama_layanan,
            'jenis_layanan_id'  => $request->jenis_layanan_id,
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

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Request $request, $id)
    {   
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

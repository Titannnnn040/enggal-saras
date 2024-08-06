<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KamarController extends Controller

{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function storeForm()
    {
        return view('pages/m_kamar/create-kamar', ['title' => 'create-kamar']);
    }

    public function storeData()
    {
        $kamar = Kamar::all();
        return view('pages/m_kamar/data-kamar', ['title' => 'data-kamar', 'kamar' => $kamar]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('pages/m_kamar/edit-kamar', ['title' => 'edit-kamar', 'kamar' => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
         $validatedData = $request->validate([
            'kode_kamar'  => [],
            'nama_kamar'  => ['required'],
            'jenis_kamar' => ['required'],
            'jumlah_bed' => [],
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $kamar = Kamar::find($id);

        $kamar->destroy($id);
        $request->session()->flash('success', 'Data berhasil di hapus');
        return redirect('/kamar/data-kamar');
    }
}

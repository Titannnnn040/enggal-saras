<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class TarifKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeForm(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        return view('pages/tarif/create-tarif-kamar', ['title' => 'create-tarif-kamar', 'kamar' => $kamar]);
    }

    public function storeData()
    {
        $kamar = Kamar::all();
        return view('pages/tarif/data-tarif-kamar', ['title' => 'data-tarif-kamar', 'kamar' => $kamar]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TarifBed $tarifBed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $kamar = Kamar::find($id);
        return view('pages/tarif/create-tarif-kamar', ['title' => 'create-tarif-kamar', 'kamar' => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'tarif_kamar'  => ['required'],
            'jasa_pelaksana'  => ['required'],
            'total_tarif' => ['']
        ]);
        
        // $validatedData['kode_kamar'] = $this->generateTmNumber();
        if($request['tarif_kamar']){
            $request['tarif_kamar'] = preg_replace('/[^\d.-]/', '',$request->tarif_kamar);
        }
        if($request['jasa_pelaksana']){
            $request['jasa_pelaksana'] = preg_replace('/[^\d.-]/', '',$request->jasa_pelaksana);
        }
        if($request['total_tarif'] == ''){
            $request['total_tarif'] = $request->tarif_kamar +  $request->jasa_pelaksana;
        }
        // return $request->all();
        $kamar = Kamar::find($id);
        $kamar->update([
            'tarif_kamar'  => $request->tarif_kamar,
            'jasa_pelaksana' => $request->jasa_pelaksana,
            'total_tarif'      => $request->total_tarif
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/tarif/data-tarif-kamar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TarifBed $tarifBed)
    {
        //
    }
}

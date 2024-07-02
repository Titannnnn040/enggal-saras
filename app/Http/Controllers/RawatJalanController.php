<?php

namespace App\Http\Controllers;

use App\Models\Rawat_Jalan;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class RawatJalanController extends Controller
{


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
    public function createData(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'max:5']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rawatJalan = Rawat_Jalan::all();
        return view('menu/rawat-jalan',compact('rawatJalan') , ['title' => 'rawat-jalan']);
    }

    public function createPasien(Request $request){
        
        $province = Province::all();
        $city     = City::all();
        $kecamatan     = Kecamatan::all();
        return view('menu/create-pasien', compact('province', 'city', 'kecamatan'), ['title' => 'create-pasien']);
    }
    /**
     * Display the specified resource.
     */
    public function show(Rawat_Jalan $rawat_Jalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rawat_Jalan $rawat_Jalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rawat_Jalan $rawat_Jalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rawat_Jalan $rawat_Jalan)
    {
        //
    }
}

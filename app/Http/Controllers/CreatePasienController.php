<?php

namespace App\Http\Controllers;

use App\Models\Payment_Method;
use App\Models\Rawat_Jalan;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class CreatePasienController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createData(Request $request)
    {
        $validatedpasien = $request->validate([
            'nama_lengkap'      => ['required','max:255'],
            'nama_panggilan'    => ['required','max:255'],
            'jenis_kelamin'     => ['required',],
            'umur'              => ['required','min:1', 'max:100'],
            'birth_date'        => ['required',],
            'nik'               => ['required','max:5'],
            'status_pernikahan' => ['required',],
            'pekerjaan'         => ['required','max:255'],
            'payment_id'        => ['required',],
            'no_bpjs_asuransi'  => ['required','min:5', 'max:5'],
            'upload_foto'       => ['required',],
            'note'              => ['required','max:255'],
            'phone_number'   => ['required','max:255'],
            'province_id'          => ['required',],
            'cities_id'              => ['required',],
            'kecamatan_id'         => ['required',],
            'kelurahan_id'         => ['required',],
            'address'           => ['required','max:255'],
            'agama'             => ['required',],
            'pendidikan'        => ['required',],
            'nama_ayah'         => ['required','max:255'],
            'nama_ibu'          => ['required','max:255'],
            'kondisi_khusus'     => ['required','max:255'],
        ]);
        // return $request->all();
        // die;

        Rawat_Jalan::create($validatedpasien);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/dashboard/rawat-jalan');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('menu/rawat-jalan', ['title' => 'rawat-jalan']);
    }

    public function createPasien(Request $request){
        $payment = Payment_Method::all();
        $province = Province::all();
        $city     = City::all();
        $kecamatan     = Kecamatan::all();
        return view('menu/create-pasien', compact('province', 'city', 'kecamatan', 'payment'), ['title' => 'create-pasien']);
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

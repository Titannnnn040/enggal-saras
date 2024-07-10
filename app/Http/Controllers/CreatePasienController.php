<?php

namespace App\Http\Controllers;

use App\Models\Payment_Method;
use App\Models\Rawat_Jalan;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CreatePasienController extends Controller
{

    private function generateRmNumber()
    {
        $count = Rawat_Jalan::all('id')->count();

        $count = $count + 1;
        $kd = str_pad($count, 5, '0', STR_PAD_LEFT);

        return 'RM' . '-' . $kd;
    }
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
            'umur'              => ['required','numeric', 'min:1', 'max:100'],
            'birth_date'        => ['required',],
            'nik'               => ['required','numeric', 'digits:15,17'],
            'status_pernikahan' => ['required',],
            'pekerjaan'         => ['required','max:255'],
            'payment_id'        => ['required',],
            'no_bpjs_asuransi'  => ['nullable','numeric', 'digits_between:13,16'],
            'upload_foto'       => ['nullable', 'image','file', 'max:1024'],
            'note'              => ['required','max:255'],
            'phone_number'      => ['required', 'numeric','digits_between:11,14'],
            'province_id'       => ['required',],
            'cities_id'         => ['required',],
            'kecamatan_id'      => ['required',],
            'kelurahan_id'      => ['required',],
            'address'           => ['required','max:255'],
            'agama'             => ['required',],
            'pendidikan'        => ['required',],
            'nama_ayah'         => ['nullable','max:255'],
            'nama_ibu'          => ['nullable','max:255'],
            'kondisi_khusus'    => ['nullable','max:255'],
        ]);
        // return $request->all();
        // die;

        $validatedpasien['no_rekam_medis'] = $this->generateRmNumber();

        if($request->file('upload_foto')){
            $validatedpasien['upload_foto'] = $request->file('upload_foto')->store('post_images');
        }

        Rawat_Jalan::create($validatedpasien);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/dashboard/pendaftaran');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('menu/pendaftaran', ['title' => 'pendaftaran']);
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
    public function edit($id)
    {
        $payment = Payment_Method::all();
        $province = Province::all();
        $city     = City::all();
        $kecamatan     = Kecamatan::all();
        $kelurahan     = Kelurahan::all();
        $rawatJalan = Rawat_Jalan::find($id);
        return view('menu/edit-pasien', compact('rawatJalan', 'province', 'city', 'kecamatan', 'kelurahan', 'payment'), ['title' => 'user-edit']);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap'      => ['required','max:255'],
            'nama_panggilan'    => ['required','max:255'],
            'jenis_kelamin'     => ['required',],
            'umur'              => ['required','numeric', 'digits_between:1,3'],
            'birth_date'        => ['required',],
            'nik'               => ['required','digits:15'],
            'status_pernikahan' => ['required',],
            'pekerjaan'         => ['required','max:255'],
            'payment_id'        => ['required',],
            'no_bpjs_asuransi'  => ['nullable','digits_between:13,20', 'max:20'],
            'upload_foto'       => ['nullable', 'image','file', 'max:1024'],
            'note'              => ['required','max:255'],
            'phone_number'      => ['required','digits_between:13,20'],
            'province_id'       => ['required',],
            'cities_id'         => ['required',],
            'kecamatan_id'      => ['required',],
            'kelurahan_id'      => ['required',],
            'address'           => ['required','max:255'],
            'agama'             => ['required',],
            'pendidikan'        => ['required',],
            'nama_ayah'         => ['nullable','max:255'],
            'nama_ibu'          => ['nullable','max:255'],
            'kondisi_khusus'    => ['nullable','max:255'],
        ]);
        $rawatJalan = Rawat_Jalan::find($id);
        $rawatJalan->update([
            'nama_lengkap'      => $request->nama_lengkap,
            'nama_panggilan'    => $request->nama_panggilan,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'umur'              => $request->umur,
            'birth_date'        => $request->birth_date,
            'nik'               => $request->nik,
            'status_pernikahan' => $request->status_pernikahan,
            'pekerjaan'         => $request->pekerjaan,
            'payment_id'        => $request->payment_id,
            'no_bpjs_asuransi'  => $request->no_bpjs_asuransi,
            'upload_foto'       => $request->upload_foto,
            'note'              => $request->note,
            'phone_number'      => $request->phone_number,
            'province_id'       => $request->province_id,
            'cities_id'         => $request->cities_id,
            'kecamatan_id'      => $request->kecamatan_id,
            'kelurahan_id'      => $request->kelurahan_id,
            'address'           => $request->address,
            'agama'             => $request->agama,
            'pendidikan'        => $request->pendidikan,
            'nama_ayah'         => $request->nama_ayah,
            'nama_ibu'          => $request->nama_ibu,
            'kondisi_khusus'    => $request->kondisi_khusus
        ]);
        if($request->file('upload_foto')){
            $validatedpasien['upload_foto'] = $request->file('upload_foto')->store('post_images');
        }

        if($rawatJalan){
            $request->session()->flash('success','Data berhasil di ubah');
            return redirect('/dashboard/pendaftaran');
        }else{
            $request->session()->flash('failed','Data Gagal di ubah');
            return redirect('/dashboard/pendaftaran');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $rawatJalan = Rawat_Jalan::find($id);
        $rawatJalan->delete($id);
        if($rawatJalan){
            $request->session()->flash('success','Data berhasil di hapus');
            return redirect('/dashboard/pendaftaran')->with('success-deleted', 'Data User Berhasil di Hapus');
        } else {
            $request->session()->flash('failed','Data Gagal di hapus');
            return redirect('/dashboard/pendaftaran')->with('error-deleted', 'User not found');
        }
        }
    }


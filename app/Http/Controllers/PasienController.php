<?php

namespace App\Http\Controllers;

use App\Models\Payment_Method;
use App\Models\Rawat_Jalan;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\ReservasiPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class PasienController extends Controller
{
    private function generateRmNumber()
    {
        $lastTmNumber = Rawat_Jalan::whereDate('created_at', Carbon::today())
        ->where('no_rekam_medis', 'like', 'RM-' . date('dmy') . '%')
        ->orderBy('no_rekam_medis', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->no_rekam_medis, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'RM-' . date('dmy') . $kd;
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
    public function indexDataPasien(Request $request)
    {
        $rawatJalan = Rawat_Jalan::latest();

        if(request('no_rekam_medis')){
            $rawatJalan->where('no_rekam_medis', 'like', '%' . request('no_rekam_medis') . '%');
        } 
        if(request('nama_lengkap')){
            $rawatJalan->where('nama_lengkap', 'like', '%' . request('nama_lengkap') . '%');
        } 
        if(request('nik')){
            $rawatJalan->where('nik', 'like', request('nik'));
        } 
        if(request('no_bpjs')){
            $rawatJalan->where('no_bpjs_asuransi', 'like', request('no_bpjs'));
        } 

        return view('pages/pasien/data-pasien', ['title' => 'data-pasien', "rawatJalan" => $rawatJalan->get()]);
    }
    public function getQueue($requestParam, $input, $parameter, $table, $output1, $output2){
        $request = request()->get($requestParam);
        $prefix = $request === $input ? $output1 : $output2;
        $count = DB::table($table)
                    ->where($parameter, $request)
                    ->count();
        $value = $prefix . '-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        return $value;
    }
    private function generateRnNumber(){
        $lastRnNumber = ReservasiPasien::whereDate('created_at', Carbon::today())
        ->where('no_reservasi', 'like', 'RN-' . date('dmy') . '%')
        ->orderBy('no_reservasi', 'desc')
        ->first();

        if ($lastRnNumber) {
        $lastNumber = intval(substr($lastRnNumber->no_reservasi, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'RN-' . date('dmy') . $kd;
    }
    public function storeReservasi($data){
        // $antrian = $request->input('jadwal_praktik');
        $table = 'm_reservasi_pasien';
        $parameter = 'jadwal_praktik';

        $data['no_reservasi'] = $this->generateRnNumber();
        $data['status'] = 1;
        $data['no_antrian'] = $this->getQueue('jadwal_praktik', 'PAGI', $parameter, $table, 'P', 'S');
        $reservasi = ReservasiPasien::create($data);

        if ($reservasi) {
            return [
                'status' => 200,
                'message' => 'Data berhasil ditambahkan',
                'id' => $reservasi->id,
            ];
        } else {
            return [
                'status' => 500,
                'message' => 'Data gagal ditambahkan',
            ];
        }
    }
    public function storePasien(Request $request)
    {
        // return $request->all();die();
        $validatedpasien = $request->validate([
            'nama_lengkap'      => ['required','max:255'],
            'nama_panggilan'    => ['required','max:255'],
            'jenis_kelamin'     => ['required',],
            'umur'              => ['required','numeric', 'min:1', 'max:100'],
            'birth_date'        => ['required',],
            'nik'               => ['required','numeric', 'digits_between:15,17', 'unique:m_pasien,nik'],
            'status_pernikahan' => ['required',],
            'pekerjaan'         => ['required','max:255'],
            'payment_id'        => ['required',],
            'no_bpjs_asuransi'  => ['nullable','numeric', 'digits_between:13,16'],
            'upload_foto'       => ['nullable', 'image', 'file', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
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
        $createPasien = Rawat_Jalan::create($validatedpasien);
        if($createPasien && $request->input('is_regist') == '1'){
            $dataReservasi = [
                'no_reservasi'   => '',
                'no_rm'          => $validatedpasien['no_rekam_medis'],
                'pasien_name'    => $validatedpasien['nama_lengkap'], 
                'no_bpjs'        => $validatedpasien['no_bpjs_asuransi'], 
                'address'        => $validatedpasien['address'], 
                'phone_no'       => $validatedpasien['phone_number'], 
                'gender'         => $validatedpasien['jenis_kelamin'], 
                'reservasi_date' => date('Y-m-d'), 
                'time'           => date('H:i:s'), 
                'layanan_id'     => null, 
                'dokter_code'    => '',
                'jadwal_praktik' => '',
                'jaminan_id'     => $validatedpasien['payment_id'],
                'status'         => 1,
                'no_antrian'     => ''
            ];
            $createReservasi = $this->storeReservasi($dataReservasi);
            if($createReservasi['status'] == 200){
                $request->session()->flash('success', 'Data berhasil ditambahkan');
                return redirect(route('create-regist-reservasi-pasien', ['id' => $createReservasi['id']]));
            }
        }
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/pasien/data-pasien');
    }
    public function indexCreatePasien(Request $request){
        $payment = Payment_Method::all();
        $province = Province::all();
        $city     = City::all();
        $kecamatan     = Kecamatan::all();
        return view('pages/pasien/create-pasien', compact('province', 'city', 'kecamatan', 'payment'), ['title' => 'create-pasien']);
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
        return view('pages/pasien/edit-pasien', compact('rawatJalan', 'province', 'city', 'kecamatan', 'kelurahan', 'payment'), ['title' => 'edit-pasien']);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi
    $request->validate([
        'nama_lengkap'      => ['required','max:255'],
        'nama_panggilan'    => ['required','max:255'],
        'jenis_kelamin'     => ['required'],
        'umur'              => ['required','numeric', 'min:1', 'max:100'],
        'birth_date'        => ['required'],
        'nik'               => ['required','numeric', 'digits_between:15,17', Rule::unique('m_pasien', 'nik')->ignore($id)],
        'status_pernikahan' => ['required'],
        'pekerjaan'         => ['required','max:255'],
        'payment_id'        => ['required'],
        'no_bpjs_asuransi'  => ['nullable','numeric', 'digits_between:13,16'],
        'upload_foto'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        'note'              => ['required','max:255'],
        'phone_number'      => ['required', 'numeric','digits_between:11,14'],
        'province_id'       => ['required'],
        'cities_id'         => ['required'],
        'kecamatan_id'      => ['required'],
        'kelurahan_id'      => ['required'],
        'address'           => ['required','max:255'],
        'agama'             => ['required'],
        'pendidikan'        => ['required'],
        'nama_ayah'         => ['nullable','max:255'],
        'nama_ibu'          => ['nullable','max:255'],
        'kondisi_khusus'    => ['nullable','max:255'],
    ]);

    $rawatJalan = Rawat_Jalan::find($id);

    // Cek jika ada file yang diupload
    if ($request->hasFile('upload_foto')) {
        // Hapus file lama jika ada
        if ($rawatJalan->upload_foto) {
            Storage::delete($rawatJalan->upload_foto);
        }
        // Simpan file baru dan dapatkan path-nya
        $filePath = $request->file('upload_foto')->store('post_images');
    } else {
        // Jika tidak ada file baru, tetap gunakan path lama
        $filePath = $rawatJalan->upload_foto;
    }

    // Update data
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
        'upload_foto'       => $filePath,
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
        'kondisi_khusus'    => $request->kondisi_khusus,
    ]);

    if ($rawatJalan) {
        $request->session()->flash('success', 'Data berhasil diubah');
        return redirect('/pasien/data-pasien');
    } else {
        $request->session()->flash('failed', 'Data gagal diubah');
        return redirect('/pasien/data-pasien');
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
            return redirect('/pasien/data-pasien')->with('success-deleted', 'Data User Berhasil di Hapus');
        } else {
            $request->session()->flash('failed','Data Gagal di hapus');
            return redirect('/pasien/data-pasien')->with('error-deleted', 'User not found');
        }
        }
    }


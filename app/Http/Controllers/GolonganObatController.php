<?php

namespace App\Http\Controllers;

use App\Models\GolonganObat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GolonganObatController extends Controller
{
    private function generateCode($model, $col, $param){
        $lastRnNumber = $model->whereDate('created_at', Carbon::today())
            ->where($col, 'like', $param . date('dmy') . '%')
            ->orderBy($col, 'desc')
            ->first();

        if ($lastRnNumber) {
            $lastNumber = intval(substr($lastRnNumber->$col, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return $param . date('dmy') . $kd;
    }
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function indexDataGolonganObat()
    {
        $golonganObat = GolonganObat::latest();
        if (request('golongan_obat_code')) {
            $this->filterData('golongan_obat_code', $golonganObat);
        }
        if (request('golongan_obat_name')) {
            $this->filterData('golongan_obat_name', $golonganObat);
        }
        return view('pages.m_golongan_obat.data-golongan-obat', ['title' => 'data-golongan-obat', 'golonganObat' => $golonganObat->get()]);
    }
    public function indexCreateGolonganObat()
    {
        return view('pages.m_golongan_obat.create-golongan-obat', ['title' => 'create-golongan-obat']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'golongan_obat_name' => ['required', 'string', 'max:255', 'unique:m_golongan_obat,golongan_obat_name']
        ]);

        $createSatuanBarang = GolonganObat::create([
            'golongan_obat_code' => $this->generateCode(new GolonganObat, 'golongan_obat_code', 'GB-'),
            'golongan_obat_name' => strtoupper($request->golongan_obat_name),
        ]);
        
        if (!$createSatuanBarang) {
            return redirect()->route('create-golongan-obat')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-golongan-obat')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function show(SatuanBarang $satuanBarang)
    {
        //
    }

    public function edit($code)
    {
        $golonganObat = GolonganObat::where('golongan_obat_code', $code)->first();
        // echo"<pre>";print_r($golonganObat);die();
        return view('pages.m_golongan_obat.edit-golongan-obat', ['title' => 'edit-golongan-obat', 'golonganObat' => $golonganObat]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'golongan_obat_name' => ['required', 'string', 'max:255', 'unique:m_golongan_obat,golongan_obat_name,' . $code . ',golongan_obat_code']
        ]);

        $updateGolonganObat = GolonganObat::where('golongan_obat_code', $code)->update([
            'golongan_obat_name' => strtoupper($request->golongan_obat_name),
            'updated_at' => Carbon::now()
        ]);

        if (!$updateGolonganObat) {
            return redirect()->route('edit-golongan-obat', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-golongan-obat')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(Request $request, $code)
    {
        $delete = GolonganObat::where('golongan_obat_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-golongan-obat')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-golongan-obat')->with('success', 'Data berhasil dihapus');
        }
    }
}

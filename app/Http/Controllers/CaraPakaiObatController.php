<?php

namespace App\Http\Controllers;

use App\Models\CaraPakaiObat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CaraPakaiObatController extends Controller
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
    public function indexDataCaraPakai()
    {
        $caraPakai = CaraPakaiObat::latest();
        if (request('cara_pakai_code')) {
            $this->filterData('cara_pakai_code', $caraPakai);
        }
        if (request('cara_pakai_name')) {
            $this->filterData('cara_pakai_name', $caraPakai);
        }
        return view('pages.m_cara_pakai_obat.data-cara-pakai', ['title' => 'data-cara-pakai', 'caraPakai' => $caraPakai->get()]);
    }
    public function indexCreateCaraPakai()
    {
        return view('pages.m_cara_pakai_obat.create-cara-pakai', ['title' => 'create-cara-pakai']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cara_pakai_name' => ['required', 'string', 'max:255', 'unique:m_cara_pakai,cara_pakai_name']
        ]);

        $create = CaraPakaiObat::create([
            'cara_pakai_code' => $this->generateCode(new CaraPakaiObat, 'cara_pakai_code', 'CP-'),
            'cara_pakai_name' => $request->cara_pakai_name,
        ]);
        
        if (!$create) {
            return redirect()->route('create-cara-pakai')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-cara-pakai')->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit($code)
    {
        $caraPakai = CaraPakaiObat::where('cara_pakai_code', $code)->first();
        // echo"<pre>";print_r($golonganObat);die();
        return view('pages.m_cara_pakai_obat.edit-cara-pakai', ['title' => 'edit-cara-pakai', 'caraPakai' => $caraPakai]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'cara_pakai_name' => ['required', 'string', 'max:255', 'unique:m_cara_pakai,cara_pakai_name,' . $code . ',cara_pakai_code']
        ]);

        $updateCaraPakai = CaraPakaiObat::where('cara_pakai_code', $code)->update([
            'cara_pakai_name' => $request->cara_pakai_name,
            'updated_at' => Carbon::now()
        ]);

        if (!$updateCaraPakai) {
            return redirect()->route('edit-cara-pakai', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-cara-pakai')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(Request $request, $code)
    {
        $delete = CaraPakaiObat::where('cara_pakai_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-cara-pakai')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-cara-pakai')->with('success', 'Data berhasil dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BentukSediaanObat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BentukSediaanObatController extends Controller
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
    public function indexDataBentukSediaan()
    {
        $bentukSediaan = BentukSediaanObat::latest();
        // echo"<pre>";print_r($bentukSediaan);die();
        if (request('bentuk_sediaan_code')) {
            $this->filterData('bentuk_sediaan_code', $bentukSediaan);
        }
        if (request('bentuk_sediaan_name')) {
            $this->filterData('bentuk_sediaan_name', $bentukSediaan);
        }
        return view('pages.m_bentuk_sediaan.data-bentuk-sediaan', ['title' => 'data-bentuk-sediaan', 'bentukSediaan' => $bentukSediaan->get()]);
    }
    public function indexCreateBentukSediaan()
    {
        return view('pages.m_bentuk_sediaan.create-bentuk-sediaan', ['title' => 'create-bentuk-sediaan']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bentuk_sediaan_name' => ['required', 'string', 'max:255', 'unique:m_bentuk_sediaan_obat,bentuk_sediaan_name']
        ]);

        $create = BentukSediaanObat::create([
            'bentuk_sediaan_code' => $this->generateCode(new BentukSediaanObat, 'bentuk_sediaan_code', 'CP-'),
            'bentuk_sediaan_name' => $request->bentuk_sediaan_name,
        ]);
        
        if (!$create) {
            return redirect()->route('create-bentuk-sediaan')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-bentuk-sediaan')->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit($code)
    {
        $bentukSediaan = BentukSediaanObat::where('bentuk_sediaan_code', $code)->first();
        // echo"<pre>";print_r($golonganObat);die();
        return view('pages.m_bentuk_sediaan.edit-bentuk-sediaan', ['title' => 'edit-bentuk-sediaan', 'bentukSediaan' => $bentukSediaan]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'bentuk_sediaan_name' => ['required', 'string', 'max:255', 'unique:m_bentuk_sediaan_obat,bentuk_sediaan_name,' . $code . ',bentuk_sediaan_code']
        ]);

        $update = BentukSediaanObat::where('bentuk_sediaan_code', $code)->update([
            'bentuk_sediaan_name' => $request->bentuk_sediaan_name,
            'updated_at' => Carbon::now()
        ]);

        if (!$update) {
            return redirect()->route('edit-bentuk-sediaan', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-bentuk-sediaan')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(Request $request, $code)
    {
        $delete = BentukSediaanObat::where('bentuk_sediaan_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-bentuk-sediaan')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-bentuk-sediaan')->with('success', 'Data berhasil dihapus');
        }
    }
}

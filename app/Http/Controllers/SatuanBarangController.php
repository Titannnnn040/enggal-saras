<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SatuanBarangController extends Controller
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
    public function indexDataSatuanBarang()
    {
        $satuanBarang = SatuanBarang::latest();
        if (request('satuan_barang_code')) {
            $this->filterData('satuan_barang_code', $satuanBarang);
        }
        if (request('satuan_barang_name')) {
            $this->filterData('satuan_barang_name', $satuanBarang);
        }
        return view('pages.m_satuan_barang.data-satuan-barang', ['title' => 'data-satuan-barang', 'satuanBarang' => $satuanBarang->get()]);
    }
    public function indexCreateSatuanBarang()
    {
        return view('pages.m_satuan_barang.create-satuan-barang', ['title' => 'create-satuan-barang']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'satuan_barang_name' => ['required', 'string', 'max:255', 'unique:m_satuan_barang,satuan_barang_name']
        ]);

        $createSatuanBarang = SatuanBarang::create([
            'satuan_barang_code' => $this->generateCode(new SatuanBarang, 'satuan_barang_code', 'SB-'),
            'satuan_barang_name' => strtoupper($request->satuan_barang_name),
        ]);
        
        if (!$createSatuanBarang) {
            return redirect()->route('create-satuan-barang')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-satuan-barang')->with('success', 'Data berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SatuanBarang $satuanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code)
    {
        $satuanBarang = SatuanBarang::where('satuan_barang_code', $code)->first();
        // echo"<pre>";print_r($satuanBarang);die();
        return view('pages.m_satuan_barang.edit-satuan-barang', ['title' => 'edit-satuan-barang', 'satuanBarang' => $satuanBarang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'satuan_barang_name' => ['required', 'string', 'max:255', 'unique:m_satuan_barang,satuan_barang_name,' . $code . ',satuan_barang_code']
        ]);

        $updateSatuanBarang = SatuanBarang::where('satuan_barang_code', $code)->update([
            'satuan_barang_name' => strtoupper($request->satuan_barang_name),
            'updated_at' => Carbon::now()
        ]);

        if (!$updateSatuanBarang) {
            return redirect()->route('edit-satuan-barang', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-satuan-barang')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $code)
    {
        $deleteSatuanBarang = SatuanBarang::where('satuan_barang_code', $code)->delete();
        if (!$deleteSatuanBarang) {
            return redirect()->route('data-satuan-barang')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-satuan-barang')->with('success', 'Data berhasil dihapus');
        }
    }
}

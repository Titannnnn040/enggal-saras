<?php

namespace App\Http\Controllers;

use App\Models\TipeHargaJual;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TipeHargaJualController extends Controller
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

    public function indexDataTipeHarga()
    {
        $data = TipeHargaJual::latest();
        if (request('tipe_harga_jual_code')) {
            $this->filterData('tipe_harga_jual_code', $data);
        }
        if (request('tipe_harga_jual_name')) {
            $this->filterData('tipe_harga_jual_name', $data);
        }
        return view('pages.m_tipe_harga_jual.data-tipe-harga-jual', ['title' => 'data-tipe-harga-jual', 'data' => $data->get()]);
    }
    
    public function indexCreateTipeHarga()
    {
        return view('pages.m_tipe_harga_jual.create-tipe-harga-jual', ['title' => 'create-tipe-harga-jual']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipe_harga_jual_name' => ['required', 'string', 'max:255', 'unique:m_tipe_harga_jual,tipe_harga_jual_name'],
            'edit_harga' => ['string', 'max:255'],
        ]);

        $create = TipeHargaJual::create([
            'tipe_harga_jual_code' => $this->generateCode(new TipeHargaJual, 'tipe_harga_jual_code', 'TH-'),
            'tipe_harga_jual_name' => strtoupper($request->tipe_harga_jual_name),
            'edit_harga'           => strtoupper($request->edit_harga) ?: 0,
        ]);
        
        if (!$create) {
            return redirect()->route('create-tipe-harga-jual')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-tipe-harga-jual')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function edit($code)
    {
        $data = TipeHargaJual::where('tipe_harga_jual_code', $code)->first();
        return view('pages.m_tipe_harga_jual.edit-tipe-harga-jual', ['title' => 'tipe-harga-jual', 'data' => $data]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'tipe_harga_jual_name' => ['required', 'string', 'max:255', 'unique:m_tipe_harga_jual,tipe_harga_jual_name,' . $code . ',tipe_harga_jual_code'],
            'edit_harga' => ['string', 'max:255'],
        ]);

        $update = TipeHargaJual::where('tipe_harga_jual_code', $code)->update([
            'tipe_harga_jual_name' => strtoupper($request->tipe_harga_jual_name),
            'edit_harga'             => strtoupper($request->edit_harga) ?: 0,
            'updated_at'       => Carbon::now()
        ]);
        if (!$update) {
            return redirect()->route('edit-tipe-harga-jual', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-tipe-harga-jual')->with('success', 'Data berhasil diubah');
        }
    }
    public function destroy(request $request, $code)
    {
        $delete = TipeHargaJual::where('tipe_harga_jual_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-tipe-harga-jual')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-tipe-harga-jual')->with('success', 'Data berhasil dihapus');
        }
    }
}

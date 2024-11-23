<?php

namespace App\Http\Controllers;
use App\Models\RentangUmur;
use Illuminate\Http\Request;

class RentangUmurController extends Controller
{
    public function index(){
        $rentangUmur = RentangUmur::all();
        return view('pages.m_lab.rentang_umur.data-rentang-umur', ['rentangUmur' => $rentangUmur, 'title' => 'data-rentang-umur']);
    }
    public function edit($id){
        $data = RentangUmur::find($id);
        return view('pages.m_lab.rentang_umur.edit-rentang-umur', ['data' => $data, 'title' => 'edit-rentang-umur']);
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'waktu' => 'required',
            'jenis' => 'required',
            'konversi' => 'required'
        ]);
        $model = RentangUmur::find($id);
        $model->update([
            'waktu' => $request->waktu,
            'jenis' => $request->jenis,
            'konversi' => $request->konversi,
        ]);
        return redirect(route('data-rentang-umur'))->with('success', 'Data obat berhasil disimpan.');

    }
}

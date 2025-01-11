<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KondisiGigi;
use Illuminate\Support\Str;

class KondisiGigiController extends Controller
{
    public function indexData(){
        $data = KondisiGigi::all();
        return view('pages.odontogram.kondisi-gigi.data', ['title' => 'Data Kondisi Gigi', 'data' => $data]);
    }

    public function indexCreate(){
        return view('pages.odontogram.kondisi-gigi.create', ['title' => 'Create Kondisi Gigi']);
    }
    public function store(Request $request){
        $request->validate([
            'jenis' => 'required',
            'code' => 'required',
            'arti' => 'required',
            'keterangan' => 'required',
            'warna' => 'required',
        ]);
        $data = [
            'uuid' => (string) Str::uuid(),
            'jenis' => $request->jenis,
            'code' => $request->code,
            'arti' => $request->arti,
            'keterangan' => $request->keterangan,
            'warna' => $request->warna,
        ];
        $create = KondisiGigi::create($data);
        if(!$create){
            return redirect()->route('data-kondisi-gigi')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-kondisi-gigi')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function edit($uuid){
        $data = KondisiGigi::where('uuid', $uuid)->first();
        return view('pages.odontogram.kondisi-gigi.edit', ['title' => 'Edit Kondisi Gigi', 'data' => $data]);
    }

    public function update(Request $request, $uuid){
        $request->validate([
            'jenis' => 'required',
            'code' => 'required',
            'arti' => 'required',
            'keterangan' => 'required',
            'warna' => 'required',
        ]);
        $data = [
            'jenis' => $request->jenis,
            'code' => $request->code,
            'arti' => $request->arti,
            'keterangan' => $request->keterangan,
            'warna' => $request->warna,
        ];
        $update = KondisiGigi::where('uuid', $uuid)->update($data);
        if(!$update){
            return redirect()->route('data-kondisi-gigi')->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-kondisi-gigi')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy($uuid){
        $delete = KondisiGigi::where('uuid', $uuid)->delete();
        if(!$delete){
            return redirect()->route('data-kondisi-gigi')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-kondisi-gigi')->with('success', 'Data berhasil dihapus');
        }
    }
}

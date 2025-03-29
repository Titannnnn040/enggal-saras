<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\KuotaReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KuotaReservasiController extends Controller
{
    public function getData(Request $request)
    {
        $layanan = $request->layanan;
        $dokter = $request->dokter;
        $id = $request->id;
    
        $query = DB::table('t_kuota_reservasi as a')
            ->join('m_dokter as b', 'a.dokter', '=', 'b.id')
            ->join('m_layanan as c', 'a.layanan', '=', 'c.id')
            ->select([
                'a.id',
                'a.layanan',
                'a.dokter',
                'c.nama_layanan',
                'b.nama_lengkap',
                'a.day',
                'a.praktek',
                'a.max_reservasi',
                'a.type',
            ]);
    
        if (!empty($layanan)) {
            $query->where('a.layanan', $layanan);
        }
    
        if (!empty($dokter)) {
            $query->where('a.dokter', $dokter);
        }
    
        if (!empty($id)) {
            $query->where('a.id', $id);
            $result = $query->first();
            if ($result) {
            return response()->json($result);
            } else {
            return response()->json(['message' => 'Data not found'], 404);
            }
        }else{
            return DataTables::of($query)
                ->addIndexColumn() // Tambahkan nomor urut (DT_RowIndex)
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-primary">Edit</button>';
                })
                ->rawColumns(['action']) // Agar HTML di kolom action tidak di-escape
                ->make(true);
        }
    
    }
    public function indexData(){
        $layanan = Layanan::all();
        $dokter = Dokter::all();
        $data = [
            'title'   => 'kuota-reservasi',
            'layanan' => $layanan,
            'dokter' => $dokter
        ];
        return view('pages.pendaftaran.kuota-reservasi.index-data', $data);
    }
    public function store(Request $request){
        $request->validate([
            'layanan'       => 'required',
            'dokter'        => 'required',
            'day'           => 'required',
            'praktek'       => 'required',
            'type'          => 'required',
            'max_reservasi' => 'required',
        ]);
        $data = [
            'layanan'       => $request->layanan,
            'dokter'        => $request->dokter,
            'day'              => $request->day,
            'praktek'          => $request->praktek,
            'type'             => $request->type,
            'max_reservasi'    => $request->max_reservasi,
        ];
        $create = KuotaReservasi::create($data);
        if($create){
            return redirect()->route('data-kuota-reservasi')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('data-kuota-reservasi')->with('error', 'Data gagal disimpan');
        }
    }
    public function update(Request $request){
        $request->validate([
            'layanan'       => 'required',
            'dokter'        => 'required',
            'day'           => 'required',
            'praktek'       => 'required',
            'type'          => 'required',
            'max_reservasi' => 'required',
        ]);
        $data = [
            'layanan'       => $request->layanan,
            'dokter'        => $request->dokter,
            'day'              => $request->day,
            'praktek'          => $request->praktek,
            'type'             => $request->type,
            'max_reservasi'    => $request->max_reservasi,
        ];
        $update = KuotaReservasi::where('id', $request->id)->update($data);
        if($update){
            return redirect()->route('data-kuota-reservasi')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->route('data-kuota-reservasi')->with('error', 'Data gagal diubah');
        }
    }
    public function destroy($id){
        $delete = KuotaReservasi::where('id', $id)->delete();
        if($delete){
            return redirect()->route('data-kuota-reservasi')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('data-kuota-reservasi')->with('error', 'Data gagal dihapus');
        }
    }
}

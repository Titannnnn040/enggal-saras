<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function getKelurahanByKecamatan($kecamatanId)
    {
        $kecamatan = Kecamatan::where('id', $kecamatanId)->first();
        $kelurahan = $kecamatan ? Kelurahan::where('district_id', $kecamatan->id)->get() : [];
        return response()->json($kelurahan);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokLab;
use App\Models\SatuanLab;
use App\Models\RentangNormal;

class PemeriksaanLabController extends Controller
{
    public function indexData(){
        return view('pages.m_lab.pemeriksaan.data-pemeriksaan', ['title' => 'data-pemeriksaan-lab']);
    }

    public function indexCreate(){

        $kelompok = KelompokLab::all();
        $satuanLab = SatuanLab::all();
        $rentangNormal = RentangNormal::all();

        $data = [
            'kelompok' => $kelompok,
            'satuan' => $satuanLab,
            'rentangNormal' => $rentangNormal,
        ];
        return view('pages.m_lab.pemeriksaan.create-pemeriksaan', ['title' => 'create-pemeriksaan-lab', 'data' => $data]);
    }
}

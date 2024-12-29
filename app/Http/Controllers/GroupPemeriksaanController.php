<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanLab;
use Illuminate\Http\Request;

class GroupPemeriksaanController extends Controller
{
    public function indexData(){
        $data = PemeriksaanLab::where('jenis', 'Kelompok')->get();
        // echo "<pre>"; print_r($data);die();
        return view('pages.m_lab.group_pemeriksaan.data-group-pemeriksaan', ['title' => 'data-group-pemeriksaan-lab', 'data' => $data]);    
    }
    public function edit($uuid){
        $data = PemeriksaanLab::where('uuid', $uuid)->first();
        $pemeriksaan = PemeriksaanLab::all();
        return view('pages.m_lab.group_pemeriksaan.edit-group-pemeriksaan', ['title' => 'edit-group-pemeriksaan-lab', 'data' => $data, 'pemeriksaan' => $pemeriksaan]);
    }
}

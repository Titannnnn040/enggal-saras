<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupPemeriksaanController extends Controller
{
    public function indexData(){
        return view('pages.m_lab.group_pemeriksaan.data-group-pemeriksaan', ['title' => 'data-group-pemeriksaan-lab']);
    }
    public function edit(){
        return view('pages.m_lab.group_pemeriksaan.edit-group-pemeriksaan', ['title' => 'edit-group-pemeriksaan-lab']);
    }
}

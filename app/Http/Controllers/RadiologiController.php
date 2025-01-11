<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Radiologi;
use Illuminate\Support\Str;

class RadiologiController extends Controller
{
    public function indexData(){
        $data = Radiologi::all();
        // echo"<pre>";print_r($data);die();
        return view('pages.radiologi.template-ro.data-template-ro', ['title' => 'Data Template RO', 'data' => $data]);
    }

    public function indexCreate(){
        $dokter = Dokter::all();
        return view('pages.radiologi.template-ro.create-template-ro', ['title' => 'Create Template RO', 'dokter' => $dokter]); 
    }

    public function store(Request $request){
        $request->validate([
            'dokter'        => 'required',
            'template_name' => 'required',
            'content'       => 'required'
        ]);
        $dokter = $request->dokter;
        $templateName = $request->template_name;
        $templateContent = $request->content;

        $data = [
            'uuid' => (string) Str::uuid(),
            'dokter_code' => $dokter,
            'template_name' => $templateName,
            'content' => $templateContent
        ];
        $store = Radiologi::create($data);
        if($store){
            return redirect()->route('data-template-ro')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect()->route('create-template-ro')->with('error', 'Data gagal disimpan');
        }
    }

    public function edit($uuid){
        $data = Radiologi::where('uuid', $uuid)->first();
        $dokter = Dokter::all();
        return view('pages.radiologi.template-ro.edit-template-ro', ['title' => 'Edit Template RO', 'data' => $data, 'dokter' => $dokter]);
    }

    public function update($uuid, Request $request){
        $request->validate([
            'dokter'        => 'required',
            'template_name' => 'required',
            'content'       => 'required'
        ]);
        $dokter = $request->dokter;
        $templateName = $request->template_name;
        $templateContent = $request->content;

        $data = [
            'dokter_code' => $dokter,
            'template_name' => $templateName,
            'content' => $templateContent
        ];
        $update = Radiologi::where('uuid', $uuid)->update($data);
        if($update){
            return redirect()->route('data-template-ro')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->route('edit-template-ro', ['uuid' => $uuid])->with('error', 'Data gagal diubah');
        }
    }

    public function destroy($uuid){
        $delete = Radiologi::where('uuid', $uuid)->delete();
        if($delete){
            return redirect()->route('data-template-ro')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect()->route('data-template-ro')->with('error', 'Data gagal dihapus');
        }
    }
}

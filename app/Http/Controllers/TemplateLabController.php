<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateLab;

use Illuminate\Support\Str;

class TemplateLabController extends Controller
{
    public function indexData(){
        $data = TemplateLab::all();
        return view('pages.m_lab.template_lab.data-template', ['title' => 'data-template-lab', 'data' => $data]);
    }
    public function indexCreate(){
        return view('pages.m_lab.template_lab.create-template', ['title' => 'create-template-lab']);
    }
    public function store(Request $request){
        // return $request->all();
        // die();
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);
        $data = [
            'uuid' => (string) Str::uuid(),
            'name' => $request->name,
            'content' => $request->content,
            'default' => $request->default ?? 0,
        ];
        $create = TemplateLab::create($data);
        if(!$create){
            return redirect()->route('data-template-lab')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-template-lab')->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit($uuid){
        $data = TemplateLab::where('uuid', $uuid)->first();
        return view('pages.m_lab.template_lab.edit-template', ['title' => 'edit-template-lab', 'data' => $data]);
    }
    public function update($uuid, Request $request){
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'content' => $request->content,
            'default' => $request->default ?? 0,
        ];
        $update = TemplateLab::where('uuid', $uuid)->update($data);
        if(!$update){
            return redirect()->route('data-template-lab')->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-template-lab')->with('success', 'Data berhasil diubah');
        }
    }
    public function destroy($uuid){
        $delete = TemplateLab::where('uuid', $uuid)->delete();
        if(!$delete){
            return redirect()->route('data-template-lab')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-template-lab')->with('success', 'Data berhasil dihapus');
        }
    }
}

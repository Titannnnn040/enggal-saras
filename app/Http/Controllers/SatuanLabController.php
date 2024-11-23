<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanLab;
use Carbon\Carbon;

class SatuanLabController extends Controller
{
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    private function generateCode($model, $col, $param){
        $lastRnNumber = $model->whereDate('created_at', Carbon::today())
            ->where($col, 'like', $param . date('dmy') . '%')
            ->orderBy($col, 'desc')
            ->first();

        if ($lastRnNumber) {
            $lastNumber = intval(substr($lastRnNumber->$col, -2));
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        return $param . date('dmy') . $kd;
    }
    public function indexData(){

        $data = SatuanLab::latest();
        if (request('code')) {
            $this->filterData('code', $data);
        }elseif(request('satuan')){
            $this->filterData('satuan', $data);
        }
        return view('pages.m_lab.satuan.data-satuan', ['data' => $data->get(), 'title' => 'data-satuan-lab']);
    }

    public function indexCreate(){
        return view('pages.m_lab.satuan.create-satuan', ['title' => 'create-satuan-lab']);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'satuan' => 'required'
        ]);
        $model = new SatuanLab();
        $data = [
            'code' => $this->generateCode($model, 'code', 'SL-'),
            'satuan' => $request->satuan
        ];
        $store = $model->create($data);
        if($store){
            return redirect(route('data-satuan-lab'))->with('success', 'Data satuan berhasil disimpan.');
        }else{
            return redirect(route('create-satuan-lab'))->with('error', 'Data satuan gagal disimpan.');  
        }
    }

    public function edit($code){
        $data = SatuanLab::where('code', $code)->first();
        return view('pages.m_lab.satuan.edit-satuan', ['title' => 'edit-satuan-lab', 'data' => $data]);
    }

    public function update(Request $request, $code){
        $validatedData = $request->validate([
            'satuan' => 'required'
        ]);
        $model = SatuanLab::where('code', $code)->first();
        $data = [
            'satuan' => $request->satuan
        ];
        $update = $model->update($data);
        if($update){
            return redirect(route('data-satuan-lab'))->with('success', 'Data satuan berhasil disimpan.');
        }else{
            return redirect(route('create-satuan-lab'))->with('error', 'Data satuan gagal disimpan.');  
        }
    }

    public function destroy($code){
        $delete = SatuanLab::where('code', $code)->delete();
        if($delete){
            return redirect(route('data-satuan-lab'))->with('success', 'Data satuan berhasil disimpan.');
        }else{
            return redirect(route('create-satuan-lab'))->with('error', 'Data satuan gagal disimpan.');  
        }
    }
}

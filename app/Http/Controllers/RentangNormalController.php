<?php

namespace App\Http\Controllers;

use App\Models\RentangNormal;
use App\Models\RentangUmur;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentangNormalController extends Controller
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
        $data = RentangNormal::latest();
        if(request('code')){
            $this->filterData('code', $data);
        }elseif(request('name')){
            $this->filterData('name', $data);
        }
        return view('pages.m_lab.rentang_normal.data-rentang-normal', ['data' => $data->get(), 'title' => 'data-rentang-normal']); 
    }

    public function indexCreate(){
        $rentangUmur = RentangUmur::all();
        return view('pages.m_lab.rentang_normal.create-rentang-normal', ['title' => 'create-rentang-normal', 'rentangUmur' => $rentangUmur]); 
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'satuan_umur' => 'required|string|max:255',
            'batas_bawah' => 'required|numeric',
            'batas_atas' => 'required|numeric',
            'gender' => 'required',
            'batas_bawah_hari' => 'required',
            'batas_atas_hari' => 'required',
        ]);

        try {
            $model = new RentangNormal();
            $data = [
                'code' => $this->generateCode($model, 'code', 'RN-'),
                'name' => $validatedData['name'],
                'satuan_umur' => $validatedData['satuan_umur'],
                'batas_bawah' => $validatedData['batas_bawah'],
                'batas_atas'  => $validatedData['batas_atas'],
                'gender'      => $validatedData['gender'],
                'batas_bawah_hari'      => $validatedData['batas_bawah_hari'],
                'batas_atas_hari'      => $validatedData['batas_atas_hari'],
            ];
            $store = $model->create($data);

            return redirect(route('data-rentang-normal'))->with('success', 'Data satuan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect(route('create-rentang-normal'))->with('error', 'Data satuan gagal disimpan, terjadi kesalahan');
        }
    }

    public function edit($code){
        $rentangUmur = RentangUmur::all();
        $data = RentangNormal::where('code', $code)->first();
        return view('pages.m_lab.rentang_normal.edit-rentang-normal', ['title' => 'create-rentang-normal', 'data' => $data, 'rentangUmur' => $rentangUmur]); 
    }

    public function update(Request $request, $code){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'satuan_umur' => 'required|string|max:255',
            'batas_bawah' => 'required|numeric',
            'batas_atas' => 'required|numeric',
            'gender' => 'required',
            'batas_bawah_hari' => 'required',
            'batas_atas_hari' => 'required',
        ]);

        try {
            $model = RentangNormal::where('code', $code);
            $data = [
                'name' => $validatedData['name'],
                'satuan_umur' => $validatedData['satuan_umur'],
                'batas_bawah' => $validatedData['batas_bawah'],
                'batas_atas'  => $validatedData['batas_atas'],
                'gender'      => $validatedData['gender'],
                'batas_bawah_hari'      => $validatedData['batas_bawah_hari'],
                'batas_atas_hari'      => $validatedData['batas_atas_hari'],
            ];
            $store = $model->update($data);

            return redirect(route('data-rentang-normal'))->with('success', 'Data satuan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect(route('create-rentang-normal'))->with('error', 'Data satuan gagal disimpan, terjadi kesalahan');
        }
    }

    public function destroy($code){
        $model = RentangNormal::where('code', $code)->delete();
        if($model){
            return redirect(route('data-rentang-normal'))->with('success', 'Data satuan berhasil dihapus');
        }else{
            return redirect(route('create-rentang-normal'))->with('error', 'Data satuan gagal dihapus, terjadi kesalahan');
        }
    }
}

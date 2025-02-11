<?php

namespace App\Http\Controllers;

use App\Models\Pabrik;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PabrikController extends Controller
{
    private function generateCode($model, $col, $param){
        $lastRnNumber = $model->whereDate('created_at', Carbon::today())
            ->where($col, 'like', $param . date('dmy') . '%')
            ->orderBy($col, 'desc')
            ->first();

        if ($lastRnNumber) {
            $lastNumber = intval(substr($lastRnNumber->$col, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return $param . date('dmy') . $kd;
    }
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function indexDataPabrik()
    {
        $pabrik = Pabrik::latest();
        if (request('pabrik_code')) {
            $this->filterData('pabrik_code', $pabrik);
        }
        if (request('pabrik_name')) {
            $this->filterData('pabrik_name', $pabrik);
        }
        return view('pages.pabrik.data-pabrik', ['title' => 'data-pabrik', 'pabrik' => $pabrik->get()]);
    }
    public function indexCreatePabrik()
    {
        return view('pages.pabrik.create-pabrik', ['title' => 'create-pabrik']);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pabrik_name' => ['required', 'string', 'max:255', 'unique:m_pabrik,pabrik_name']
        ]);

        $createPabrik = Pabrik::create([
            'pabrik_code' => $this->generateCode(new Pabrik, 'pabrik_code', 'PB-'),
            'pabrik_name' => strtoupper($request->pabrik_name),
        ]);
        
        if (!$createPabrik) {
            return redirect()->route('create-pabrik')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-pabrik')->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit($code)
    {
        $pabrik = Pabrik::where('pabrik_code', $code)->first();
        return view('pages.pabrik.edit-pabrik', ['title' => 'edit-pabrik', 'pabrik' => $pabrik]);
    }
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'pabrik_name' => ['required', 'string', 'max:255', 'unique:m_pabrik,pabrik_name,' . $code . ',pabrik_code']
        ]);

        $pabrik = Pabrik::where('pabrik_code', $code)->update([
            'pabrik_name' => strtoupper($request->pabrik_name),
            'updated_at' => Carbon::now()
        ]);
        if (!$pabrik) {
            return redirect()->route('edit-pabrik', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-pabrik')->with('success', 'Data berhasil diubah');
        }
    }
    public function destroy(request $request, $code)
    {
        $pabrik = Pabrik::where('pabrik_code', $code)->delete();
        if (!$pabrik) {
            return redirect()->route('data-pabrik')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-pabrik')->with('success', 'Data berhasil dihapus');
        }
    }
}
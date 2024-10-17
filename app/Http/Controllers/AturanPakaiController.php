<?php

namespace App\Http\Controllers;

use App\Models\AturanPakai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AturanPakaiController extends Controller
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
    public function indexDataAturanPakai()
    {
        $aturanPakai = AturanPakai::latest();
        if (request('aturan_pakai_code')) {
            $this->filterData('aturan_pakai_code', $aturanPakai);
        }
        if (request('aturan_pakai_name')) {
            $this->filterData('aturan_pakai_name', $aturanPakai);
        }
        return view('pages.m_aturan_pakai.data-aturan-pakai', ['title' => 'data-aturan-pakai', 'aturanPakai' => $aturanPakai->get()]);
    }
    public function indexCreateAturanPakai()
    {
        return view('pages.m_aturan_pakai.create-aturan-pakai', ['title' => 'create2-aturan-pakai']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'aturan_pakai_name' => ['required', 'string', 'max:255']
        ]);

        $createAturanPakai = AturanPakai::create([
            'aturan_pakai_code' => $this->generateCode(new AturanPakai, 'aturan_pakai_code', 'AP-'),
            'aturan_pakai_name' => $request->aturan_pakai_name,
        ]);
        
        if (!$createAturanPakai) {
            return redirect()->route('create-aturan-pakai')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-aturan-pakai')->with('success', 'Data berhasil ditambahkan');
        }
    }
    public function edit($code)
    {
        $aturanPakai = AturanPakai::where('aturan_pakai_code', $code)->first();
        // echo"<pre>";print_r($aturanPakai);die();
        return view('pages.m_aturan_pakai.edit-aturan-pakai', ['title' => 'edit-aturan-pakai', 'aturanPakai' => $aturanPakai]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'aturan_pakai_name' => ['required', 'string', 'max:255']
        ]);

        $updateAturanPakai = AturanPakai::where('aturan_pakai_code', $code)->update([
            'aturan_pakai_name' => $request->aturan_pakai_name,
            'updated_at' => Carbon::now()
        ]);

        if (!$updateAturanPakai) {
            return redirect()->route('edit-aturan-pakai', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-aturan-pakai')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(Request $request, $code)
    {
        $delete = AturanPakai::where('aturan_pakai_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-aturan-pakai')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-aturan-pakai')->with('success', 'Data berhasil dihapus');
        }
    }
}

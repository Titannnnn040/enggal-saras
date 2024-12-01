<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokLab;
use Carbon\Carbon;

class KelompokLabController extends Controller
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

    public function indexData()
    {
        $data = KelompokLab::latest();
        if (request('code')) {
            $this->filterData('code', $data);
        }elseif(request('kelompok')){
            $this->filterData('kelompok', $data);
        }
        return view('pages.m_lab.kelompok.data-kelompok', ['title' => 'data-kelompok-lab', 'data' => $data->get()]);
    }
    public function indexCreate()
    {
        return view('pages.m_lab.kelompok.create-kelompok', ['title' => 'create-kelompok-lab']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kelompok' => 'required',
        ]);

        $data = [
            'code' => $this->generateCode(new KelompokLab(), 'code', 'KL-'),
            'kelompok' => $request->kelompok,
        ];

        $store = KelompokLab::create($data);

        if ($store) {
            return redirect(route('data-kelompok-lab'))->with('success', 'Data kelompok berhasil disimpan.');
        } else {
            return redirect(route('create-kelompok-lab'))->with('error', 'Data kelompok gagal disimpan.');
        }
    }

    public function edit($code)
    {
        $data = KelompokLab::where('code', $code)->first();
        return view('pages.m_lab.kelompok.edit-kelompok', ['title' => 'edit-kelompok-lab', 'data' => $data]);
    }

    public function update(Request $request, $code){
        $request->validate([
            'kelompok' => 'required',
        ]);

        $data = [
            'kelompok' => $request->kelompok,
        ];

        $update = KelompokLab::where('code', $code)->update($data);

        if ($update) {
            return redirect(route('data-kelompok-lab'))->with('success', 'Data kelompok berhasil diubah.');
        } else {
            return redirect(route('edit-kelompok-lab', $code))->with('error', 'Data kelompok gagal diubah.');
        }
    }

    public function destroy($code)
    {
        $delete = KelompokLab::where('code', $code)->delete();
        if ($delete) {
            return redirect(route('data-kelompok-lab'))->with('success', 'Data kelompok berhasil dihapus.');
        } else {
            return redirect(route('data-kelompok-lab'))->with('error', 'Data kelompok gagal dihapus.');
        }
    }
}




























































































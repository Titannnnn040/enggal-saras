<?php

namespace App\Http\Controllers;

use App\Models\TipeJaminan;
use App\Models\Payment_Method;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TipeJaminanController extends Controller
{
    private function generateTjNumber()
    {
        $lastTmNumber = TipeJaminan::whereDate('created_at', Carbon::today())
        ->where('code_tipe_jaminan', 'like', 'TJ-' . date('dmy') . '%')
        ->orderBy('code_tipe_jaminan', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->code_tipe_jaminan, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'TJ-' . date('dmy') . $kd;
    }
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function indexData()
    {
        $tipeJaminan = TipeJaminan::latest();
        if (request('code_tipe_jaminan')) {
            $this->filterData('code_tipe_jaminan', $tipeJaminan);
        }
        if (request('nama_tipe_jaminan')) {
            $this->filterData('nama_tipe_jaminan', $tipeJaminan);
        }
        return view('pages.tipe_jaminan.data-tipe-jaminan', ['title' => 'data-tipe-jaminan', 'tipeJaminan' => $tipeJaminan->get()]);
    }

    public function indexCreate()
    {
        $payment = Payment_Method::all();
        return view('pages.tipe_jaminan.create-tipe-jaminan', ['title' => 'create-tipe-jaminan']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_tipe_jaminan'  => [''],
            'nama_tipe_jaminan'  => ['required', 'unique:m_tipe_jaminan,nama_tipe_jaminan'],
            'tipe_jaminan'       => ['required']
        ]);

        if($request['code_tipe_jaminan'] == ''){
            $validatedData['code_tipe_jaminan'] = $this->generateTjNumber();
        }
        $validatedData['nama_tipe_jaminan'] = strtoupper($validatedData['nama_tipe_jaminan']);
        $tipeJaminan = TipeJaminan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tipe-jaminan/data-tipe-jaminan');
    }

    public function edit($id)
    {
        $tipeJaminan = TipeJaminan::find($id);
        return view('pages.tipe_jaminan.edit-tipe-jaminan', ['title' => 'edit-tipe-jaminan', 'tipeJaminan' => $tipeJaminan]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_tipe_jaminan'  => ['required', 'unique:m_tipe_jaminan,nama_tipe_jaminan,' . $id],
            'tipe_jaminan'       => ['required']
        ]);
        $tipeJaminan = TipeJaminan::find($id);
        $tipeJaminan->update([
            'nama_tipe_jaminan'  => strtoupper($request->nama_tipe_jaminan),
            'tipe_jaminan'       => $request->tipe_jaminan
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/tipe-jaminan/data-tipe-jaminan');
    }

    public function destroy(Request $request, $id)
    {
        $tipeJaminan = TipeJaminan::find($id);
        $tipeJaminan->delete($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/tipe-jaminan/data-tipe-jaminan');

    }
}

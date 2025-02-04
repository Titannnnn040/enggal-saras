<?php

namespace App\Http\Controllers;

use App\Models\Jaminan;
use App\Models\TipeJaminan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JaminanController extends Controller
{
    private function generateCjNumber()
    {
        $lastTmNumber = Jaminan::whereDate('created_at', Carbon::today())
        ->where('code_jaminan', 'like', 'CJ-' . date('dmy') . '%')
        ->orderBy('code_jaminan', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->code_jaminan, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'CJ-' . date('dmy') . $kd;
    }
    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }
    public function indexData()
    {
        $Jaminan = Jaminan::latest();
        if (request('code_jaminan')) {
            $this->filterData('code_jaminan', $Jaminan);
        }
        if (request('nama_jaminan')) {
            $this->filterData('nama_jaminan', $Jaminan);
        }
        return view('pages.jaminan.data-jaminan', ['title' => 'data-jaminan', 'Jaminan' => $Jaminan->get()]);
    }

    public function indexCreate()
    {
        return view('pages.jaminan.create-jaminan', ['title' => 'create-jaminan']);
    }

    public function store(Request $request)
    {
        // return $request->all();
        // die();
        $validatedData = $request->validate([
            'code_jaminan' => [''],
            'nama_jaminan' => ['required', 'unique:m_jaminan,nama_jaminan'],
            'tipe_jaminan' => ['required'],
            'detail_harga' => ['']
        ]);

        if($request['code_jaminan'] == ''){
            $validatedData['code_jaminan'] = $this->generateCjNumber();
        }
        $validatedData['nama_jaminan'] = strtoupper($validatedData['nama_jaminan']);

        $Jaminan = Jaminan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/jaminan/data-jaminan');
    }

    public function edit($id)
    {
        $tipeJaminan = TipeJaminan::all();
        $jaminan = Jaminan::find($id);
        return view('pages.jaminan.edit-jaminan', ['title' => 'edit-jaminan', 'tipeJaminan' => $tipeJaminan, 'jaminan' => $jaminan]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jaminan' => ['required', 'unique:m_jaminan,nama_jaminan,' . $id],
            'tipe_jaminan' => ['required'],
            'detail_harga' => ['']
        ]);
        $jaminan = Jaminan::find($id);
        $jaminan->update([
            'nama_jaminan' => strtoupper($request->nama_jaminan),
            'tipe_jaminan' => $request->tipe_jaminan,
            'detail_harga' => $request->detail_harga ?? 'No'
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/jaminan/data-jaminan');
    }

    public function destroy(Request $request, $id)
    {
        $jaminan = Jaminan::find($id);
        $jaminan->delete($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/jaminan/data-jaminan');

    }
}

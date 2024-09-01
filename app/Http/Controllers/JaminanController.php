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

    public function indexDataJaminan()
    {
        $Jaminan = Jaminan::all();
        return view('pages/m_jaminan/data-jaminan', ['title' => 'data-jaminan', 'Jaminan' => $Jaminan]);
    }

    public function indexCreateJaminan()
    {
        return view('pages/m_jaminan/create-jaminan', ['title' => 'create-jaminan']);
    }

    public function storeJaminan(Request $request)
    {
        // return $request->all();
        // die();
        $validatedData = $request->validate([
            'code_jaminan' => [''],
            'nama_jaminan' => ['required'],
            'tipe_jaminan' => ['required'],
            'detail_harga' => ['']
        ]);

        if($request['code_jaminan'] == ''){
            $validatedData['code_jaminan'] = $this->generateCjNumber();
        }

        $Jaminan = Jaminan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/jaminan/data-jaminan');
    }

    public function edit($id)
    {
        $tipeJaminan = TipeJaminan::all();
        $jaminan = Jaminan::find($id);
        return view('pages/m_jaminan/edit-jaminan', ['title' => 'edit-jaminan', 'tipeJaminan' => $tipeJaminan, 'jaminan' => $jaminan]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jaminan' => ['required'],
            'tipe_jaminan' => ['required'],
            'detail_harga' => ['']
        ]);
        $jaminan = Jaminan::find($id);
        $jaminan->update([
            'nama_jaminan' => $request->nama_jaminan,
            'tipe_jaminan' => $request->tipe_jaminan,
            'detail_harga' => $request->detail_harga
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

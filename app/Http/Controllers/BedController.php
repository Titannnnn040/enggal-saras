<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BedController extends Controller
{
    private function generateKbNumber()
    {
        $lastTmNumber = Bed::whereDate('created_at', Carbon::today())
                            ->where('kode_bed', 'like', 'KB-' . date('dmy') . '%')
                            ->orderBy('kode_bed', 'desc')
                            ->first();
    
        if ($lastTmNumber) {
            $lastNumber = intval(substr($lastTmNumber->kode_bed, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
    
        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    
        return 'KB-' . date('dmy') . $kd;
    }
    public function indexData(Request $request)
    {
        $bed = Bed::latest();
        if(request('kode_bed')){
            $bed->where('kode_bed', 'like' , '%' . request('kode_bed') . '%');
        }
        if(request('nama_bed')){
            $bed->where('nama_bed', 'like' , '%' . request('nama_bed') . '%');
        }
        return view('pages.bed.data-bed', ['title' => 'data-bed', 'bed' => $bed->get()]);
    }
    public function indexCreate()
    {
        $kamar = Kamar::all();
        return view('pages.bed.create-bed', ['title' => 'create-bed', 'kamar' => $kamar]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_bed'  => [],
            'nama_bed'  => ['required'],
            'kamar_id'=> ['required'],
            'status'    => [],
            'cadangan'  => []
        ]);
        $validatedData['kode_bed'] = $this->generateKbNumber();
        if($request['status'] == ''){
            $validatedData['status'] = 'tidak aktif';
        }
        if($request['cadangan'] == ''){
            $validatedData['cadangan'] = 'No';
        }
        Bed::create($validatedData);
        $kamar = Kamar::find($validatedData['kamar_id']);
        if ($kamar) {
            $kamar->increment('jumlah_bed');
        }
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/bed/data-bed');
    }
    public function edit($id)
    {
        $bed = Bed::find($id);
        $kamar = Kamar::all();
        return view('pages.bed.edit-bed', ['title' => 'edit-bed', 'bed' => $bed, 'kamar' => $kamar]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bed'  => [],
            'nama_bed'  => ['required'],
            'kamar_id'  => ['required'],
            'status'    => [],
            'cadangan'  => []
        ]);
        $request['kode_bed'] = $this->generateKbNumber();
        if($request['status'] == ''){
            $request['status'] = 'tidak aktif';
        }
        if($request['cadangan'] == ''){
            $request['cadangan'] = 'No';
        }

        $bed = Bed::find($id);
        $bed->update([
            'kode_bed' => $request->kode_bed,
            'nama_bed' => $request->nama_bed,
            'kamar_id' => $request->kamar_id,
            'status'   => $request->status,
            'cadangan' => $request->cadangan
        ]);
        $request->session()->flash('success', 'Data berhasil diubah');
        return redirect('/bed/data-bed');
    }
    public function destroy(Request $request, $id)
    {
        $bed = Bed::find($id);
        $bed->destroy($id);
        
        $kamar = Kamar::find($bed['kamar_id']);
        if ($kamar) {
            // Increment the jumlah_bed by 1
            $kamar->decrement('jumlah_bed');
        }
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/bed/data-bed');
    }
}

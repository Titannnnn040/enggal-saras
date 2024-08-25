<?php

namespace App\Http\Controllers;

use App\Models\TarifLab;
use App\Models\GroupTarif;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class TarifLabController extends Controller
{
    private function generateLbNumber()
    {
        $lastTmNumber = TarifLab::whereDate('created_at', Carbon::today())
        ->where('code_tarif_lab', 'like', 'LB-' . date('dmy') . '%')
        ->orderBy('code_tarif_lab', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->code_tarif_lab, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'LB-' . date('dmy') . $kd;
    }
    /**
     * Display a listing of the resource.
     */
    public function indexDataTarifLab()
    {
        $groupTarif = GroupTarif::all();
        $tarifLab = TarifLab::all();
        return view('pages/tarif/tarif-lab/data-tarif-lab', ['title' => 'data-tarif-lab', 'tarifLab' => $tarifLab, 'groupTarif' => $groupTarif]);
    }

    public function indexTarifLab()
    {
        $groupTarif = GroupTarif::all();
        return view('pages/tarif/tarif-lab/create-tarif-lab', ['title' => 'create-tarif-lab', 'groupTarif' => $groupTarif]);
    }

    public function storeTarifLab(Request $request)
    {
        $validatedData = $request->validate([
            'code_tarif_lab' => [''], 
            'nama_tarif_lab' => ['required', 'unique:m_tarif_lab,nama_tarif_lab'],
            'group_tarif_id' => ['required'],
            'fee_medis'      => ['required'],
            'jasa_klinik'    => ['required'],
            'jasa_pengirim'  => ['required'],
            'biaya_rujukan'  => ['required'],
            'total_tarif'    => [''],
            'kode_tarif_bpjs'=> [''],
            'nama_tarif_bpjs'=> [''],
        ]);
        if($request['fee_medis']){
            $validatedData['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $validatedData['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['jasa_pengirim']){
            $validatedData['jasa_pengirim'] = preg_replace('/[^\d.-]/', '',$request->jasa_pengirim);
        }
        if($request['biaya_rujukan']){
            $validatedData['biaya_rujukan'] = preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        if($request['total_tarif'] == ''){
            $validatedData['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik) + preg_replace('/[^\d.-]/', '',$request->jasa_pengirim) + preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        if($request['code_tarif_lab'] == ''){
            $validatedData['code_tarif_lab'] = $this->generateLbNumber();
        }
        // return $request->all();
        $radiologi = TarifLab::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tarif/data-tarif-lab');
    }

    public function edit($id)
    {
        $groupTarif = GroupTarif::all();
        $tarifLab = TarifLab::find($id);
        return view('pages/tarif/tarif-lab/edit-tarif-lab', ['title' => 'create-tarif-lab', 'tarifLab' => $tarifLab, 'groupTarif' => $groupTarif]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code_tarif_lab' => [''], 
            'nama_tarif_lab' => ['required', Rule::unique('m_tarif_lab', 'nama_tarif_lab')->ignore($id)],
            'group_tarif_id' => ['required'],
            'fee_medis'      => ['required'],
            'jasa_klinik'    => ['required'],
            'jasa_pengirim'  => ['required'],
            'biaya_rujukan'  => ['required'],
            'total_tarif'    => [''],
            'kode_tarif_bpjs'=> [''],
            'nama_tarif_bpjs'=> [''],
        ]);
        if($request['fee_medis']){
            $request['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $request['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['jasa_pengirim']){
            $request['jasa_pengirim'] = preg_replace('/[^\d.-]/', '',$request->jasa_pengirim);
        }
        if($request['biaya_rujukan']){
            $request['biaya_rujukan'] = preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        if($request['total_tarif'] == ''){
            $request['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik) + preg_replace('/[^\d.-]/', '',$request->jasa_pengirim) + preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        $tarifLab = TarifLab::find($id);
        $tarifLab->update([
            'nama_tarif_lab'       => $request->nama_tarif_lab,
            'group_tarif_id'       => $request->group_tarif_id,
            'fee_medis'            => $request->fee_medis, 
            'jasa_klinik'          => $request->jasa_klinik, 
            'jasa_pengirim'        => $request->jasa_pengirim,
            'biaya_rujukan'        => $request->biaya_rujukan,
            'total_tarif'          => $request->total_tarif 
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('tarif/data-tarif-lab');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $tarifLab = TarifLab::find($id);
        $tarifLab->delete($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('tarif/data-tarif-lab');
    }
}

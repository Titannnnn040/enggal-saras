<?php

namespace App\Http\Controllers;

use App\Models\TarifRadiologi;
use App\Models\GroupTarif;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TarifRadiologiController extends Controller
{
    private function generateRoNumber()
    {
        $lastTmNumber = TarifRadiologi::whereDate('created_at', Carbon::today())
        ->where('tarif_radiologi_code', 'like', 'RO-' . date('dmy') . '%')
        ->orderBy('tarif_radiologi_code', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->tarif_radiologi_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'RO-' . date('dmy') . $kd;
    }
    /**
     * Display a listing of the resource.
     */
    public function indexDataTarifRadiologi()
    {
        $groupTarif = GroupTarif::all();
        $tarifRadiologi = TarifRadiologi::all();
        return view('pages/tarif/tarif_radiologi/data-tarif-radiologi', ['title' => 'create-tarif-radiologi', 'tarifRadiologi' => $tarifRadiologi, 'groupTarif' => $groupTarif]);
    }

    public function indexTarifRadiologi()
    {
        $groupTarif = GroupTarif::all();
        return view('pages/tarif/tarif_radiologi/create-tarif-radiologi', ['title' => 'create-tarif-radiologi', 'groupTarif' => $groupTarif]);
    }
    
    public function storeTarifRadiologi(Request $request)
    {
       $validatedData = $request->validate([
            'code_tarif_radiologi' => [''],
            'nama_tarif_radiologi' => ['required'],
            'group_tarif_id'       => ['required'],
            'fee_medis'            => ['required'],
            'jasa_klinik'          => ['required'],
            'jasa_radiologi'       => ['required'],
            'biaya_rujukan'        => ['required'],
            'total_tarif'          => ['']
       ]);

        if($request['fee_medis']){
            $validatedData['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $validatedData['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['jasa_radiologi']){
            $validatedData['jasa_radiologi'] = preg_replace('/[^\d.-]/', '',$request->jasa_radiologi);
        }
        if($request['biaya_rujukan']){
            $validatedData['biaya_rujukan'] = preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        if($request['total_tarif'] == ''){
            $validatedData['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik) + preg_replace('/[^\d.-]/', '',$request->jasa_radiologi) + preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        if($request['tarif_radiologi_code'] == ''){
            $validatedData['tarif_radiologi_code'] = $this->generateRoNumber();
        }
        // return $request->all();
        $radiologi = TarifRadiologi::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tarif/data-tarif-radiologi');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Rontgen $rontgen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $groupTarif = GroupTarif::all();
        $tarifRadiologi = TarifRadiologi::find($id);
        return view('pages/tarif/tarif_radiologi/edit-tarif-radiologi', ['title' => 'edit-tarif-radiologi', 'tarifRadiologi' => $tarifRadiologi, 'groupTarif' => $groupTarif]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code_tarif_radiologi' => [''],
            'nama_tarif_radiologi' => ['required'],
            'group_tarif_id'       => ['required'],
            'fee_medis'            => ['required'],
            'jasa_klinik'          => ['required'],
            'jasa_radiologi'       => ['required'],
            'biaya_rujukan'        => ['required'],
            'total_tarif'          => ['']
        ]);
    
        if($request['fee_medis']){
            $request['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $request['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['jasa_radiologi']){
            $request['jasa_radiologi'] = preg_replace('/[^\d.-]/', '',$request->jasa_radiologi);
        }
        if($request['biaya_rujukan']){
            $request['biaya_rujukan'] = preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        if($request['total_tarif'] == ''){
            $request['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik) + preg_replace('/[^\d.-]/', '',$request->jasa_radiologi) + preg_replace('/[^\d.-]/', '',$request->biaya_rujukan);
        }
        $tarifRadiologi = TarifRadiologi::find($id);
        $tarifRadiologi->update([
            'nama_tarif_radiologi' => $request->nama_tarif_radiologi,
            'group_tarif_id'       => $request->group_tarif_id,
            'fee_medis'            => $request->fee_medis, 
            'jasa_klinik'          => $request->jasa_klinik, 
            'jasa_radiologi'       => $request->jasa_radiologi,
            'biaya_rujukan'        => $request->biaya_rujukan,
            'total_tarif'          => $request->total_tarif 
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('tarif/data-tarif-radiologi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $tarifRadiologi = TarifRadiologi::find($id);
        $tarifRadiologi->delete($id);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('tarif/data-tarif-radiologi');
    }
}

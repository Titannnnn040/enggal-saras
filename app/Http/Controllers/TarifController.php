<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\GroupTarif;
use App\Models\GroupTarifTindakan;
use App\Models\TarifPendaftaran;
use App\Models\TarifTindakan;
use Carbon\Carbon;

class TarifController extends Controller
{
    private function generateGtNumber()
    {
        $lastTmNumber = GroupTarif::whereDate('created_at', Carbon::today())
        ->where('g_tarif_code', 'like', 'GT-' . date('dmy') . '%')
        ->orderBy('g_tarif_code', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->g_tarif_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'GT-' . date('dmy') . $kd;
    }
    private function generateTgNumber()
    {
        $lastTmNumber = GroupTarifTindakan::whereDate('created_at', Carbon::today())
        ->where('g_tarif_tindakan_code', 'like', 'TG-' . date('dmy') . '%')
        ->orderBy('g_tarif_tindakan_code', 'desc')
        ->first();

        if ($lastTmNumber) {
        $lastNumber = intval(substr($lastTmNumber->g_tarif_tindakan_code, -2));
        $newNumber = $lastNumber + 1;
        } else {
        $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return 'TG-' . date('dmy') . $kd;
    }
        private function generateTpNumber()
    {
        $lastTmNumber = TarifPendaftaran::whereDate('created_at', Carbon::today())
                            ->where('code_pendaftaran', 'like', 'TP-' . date('dmy') . '%')
                            ->orderBy('code_pendaftaran', 'desc')
                            ->first();
    
        if ($lastTmNumber) {
            $lastNumber = intval(substr($lastTmNumber->code_pendaftaran, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
    
        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    
        return 'TP-' . date('dmy') . $kd;
    }
        private function generateTtNumber()
    {
        $lastTmNumber = TarifTindakan::whereDate('created_at', Carbon::today())
                            ->where('code_tarif_tindakan', 'like', 'TT-' . date('dmy') . '%')
                            ->orderBy('code_tarif_tindakan', 'desc')
                            ->first();
    
        if ($lastTmNumber) {
            $lastNumber = intval(substr($lastTmNumber->code_tarif_tindakan, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
    
        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    
        return 'TT-' . date('dmy') . $kd;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function storeForm(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        return view('pages/tarif/create-tarif-kamar', ['title' => 'create-tarif-kamar', 'kamar' => $kamar]);
    }

    public function storeData()
    {
        $kamar = Kamar::all();
        return view('pages/tarif/data-tarif-kamar', ['title' => 'data-tarif-kamar', 'kamar' => $kamar]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TarifBed $tarifBed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $kamar = Kamar::find($id);
        return view('pages/tarif/create-tarif-kamar', ['title' => 'create-tarif-kamar', 'kamar' => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'tarif_kamar'  => ['required'],
            'jasa_pelaksana'  => ['required'],
            'total_tarif' => ['']
        ]);
        
        // $validatedData['kode_kamar'] = $this->generateTmNumber();
        if($request['tarif_kamar']){
            $request['tarif_kamar'] = preg_replace('/[^\d.-]/', '',$request->tarif_kamar);
        }
        if($request['jasa_pelaksana']){
            $request['jasa_pelaksana'] = preg_replace('/[^\d.-]/', '',$request->jasa_pelaksana);
        }
        if($request['total_tarif'] == ''){
            $request['total_tarif'] = $request->tarif_kamar +  $request->jasa_pelaksana;
        }
        // return $request->all();
        $kamar = Kamar::find($id);
        $kamar->update([
            'tarif_kamar'  => $request->tarif_kamar,
            'jasa_pelaksana' => $request->jasa_pelaksana,
            'total_tarif'      => $request->total_tarif
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/tarif/data-tarif-kamar');
    }
    
    public function indexGroupTarif()
    {
        return view('pages/tarif/create-group-tarif', ['title' => 'create-group-tarif']);
    }
    public function indexDataGroupTarif()
    {
        $groupTarif = GroupTarif::all();
        return view('pages/tarif/group-tarif', ['title' => 'group-tarif', 'groupTarif' => $groupTarif]);
    }

    public function storeGroupTarif(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'g_tarif_code' => [''],
            'nama_group_tarif' => ['required']
        ]);
        $validatedData['g_tarif_code'] = $this->generateGtNumber();
        $kamar = GroupTarif::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tarif/group-tarif');
    }

    public function editGroupTarif($id){
        $groupTarif = GroupTarif::find($id);
        return view('pages/tarif/edit-group-tarif', ['title' => 'edit-group-tarif', 'groupTarif' => $groupTarif]);
    }
    
    public function updateGroupTarif(Request $request, $id){
        
        $request->validate([
            'g_tarif_code' => [''],
            'nama_group_tarif' => ['required']
        ]);
        $groupTarif = GroupTarif::find($id);
        $groupTarif->update([
            'nama_group_tarif' => $request->nama_group_tarif
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/tarif/group-tarif');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroyGroupTarif(Request $request, $id)
    {
        $groupTarif = GroupTarif::find($id);
        $groupTarif->destroy($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/tarif/group-tarif');

    }

    public function indexGroupTarifTindakan()
    {
        return view('pages/tarif/create-group-tarif-tindakan', ['title' => 'create-group-tarif-tindakan']);
    }

    public function storeGroupTarifTindakan(Request $request){
        // return $request->all();
        $validatedData = $request->validate([
            'g_tarif_tindakan_code' => [''],
            'nama_group_tarif_tindakan' => ['required']
        ]);
        $validatedData['g_tarif_tindakan_code'] = $this->generateTgNumber();
        $kamar = GroupTarifTindakan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tarif/group-tarif-tindakan');
    }

    public function indexDataGroupTarifTindakan()
    {
        $groupTarifTindakan = GroupTarifTindakan::all();
        return view('pages/tarif/group-tarif-tindakan', ['title' => 'group-tarif-tindakan', 'groupTarifTindakan' => $groupTarifTindakan]);
    }

    public function editGroupTarifTindakan($id){
        $groupTarifTindakan = GroupTarifTindakan::find($id);
        return view('pages/tarif/edit-group-tarif-tindakan', ['title' => 'edit-group-tarif-tindakan', 'groupTarifTindakan' => $groupTarifTindakan]);
    }

    public function updateGroupTarifTindakan(Request $request, $id){
        
        $request->validate([
            'nama_group_tarif_tindakan' => ['required']
        ]);
        $groupTarifTindakan = GroupTarifTindakan::find($id);
        $groupTarifTindakan->update([
            'nama_group_tarif_tindakan' => $request->nama_group_tarif_tindakan
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/tarif/group-tarif-tindakan');
    }   

    public function destroyGroupTarifTindakan(Request $request, $id)
    {
        $groupTarifTindakan = GroupTarifTindakan::find($id);
        $groupTarifTindakan->destroy($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/tarif/group-tarif-tindakan');

    }

    public function indexTarifPendaftaran()
    {
        return view('pages/tarif/create-tarif-pendaftaran', ['title' => 'create-tarif-pendaftaran']);
    }


    public function storeTarifPendaftaran(Request $request)
    {
        $validatedData = $request->validate([
            'code_pendaftaran'  => [''],
            'nama_pendaftaran'  => ['required'],
            'fee_medis'         => ['required'],
            'jasa_klinik'       => ['required'],
            'total_tarif'       => ['']
        ]);
        
        // $validatedData['kode_kamar'] = $this->generateTmNumber();
        if($request['fee_medis']){
            $validatedData['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $validatedData['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['total_tarif'] == ''){
            $validatedData['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['code_pendaftaran'] == ''){
            $validatedData['code_pendaftaran'] = $this->generateTpNumber();
        }
        // return $request->all();
        $pendaftaran = TarifPendaftaran::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tarif/data-tarif-pendaftaran');
    }

    public function indexDataTarifPendaftaran(){
        $pendaftaran = TarifPendaftaran::all();
        return view('pages/tarif/data-tarif-pendaftaran', ['title' => 'data-tarif-pendaftaran', 'pendaftaran' => $pendaftaran]);
    }

    public function editTarifPendaftaran($id){
        $pendaftaran = TarifPendaftaran::find($id);
        return view('pages/tarif/edit-tarif-pendaftaran', ['title' => 'edit-tarif-pendaftaran', 'pendaftaran' => $pendaftaran]);
    }

    public function updateTarifPendaftaran(Request $request, $id)
    { 
        $request->validate([
            'code_pendaftaran'  => [''],
            'nama_pendaftaran'  => ['required'],
            'fee_medis'         => ['required'],
            'jasa_klinik'       => ['required'],
            'total_tarif'       => ['']
        ]);
        
        if($request['fee_medis']){
            $request['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $request['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['total_tarif'] == ''){
            $request['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['code_pendaftaran'] == ''){
            $request['code_pendaftaran'] = $this->generateTpNumber();
        }
        // return $request->all();
        $pendaftaran = TarifPendaftaran::find($id);
        $pendaftaran->update([
            'code_pendaftaran'  => $request->code_pendaftaran,
            'nama_pendaftaran'  => $request->nama_pendaftaran,
            'fee_medis'         => $request->fee_medis,
            'jasa_klinik'       => $request->jasa_klinik,
            'total_tarif'       => $request->total_tarif
        ]);
        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('/tarif/data-tarif-pendaftaran');
    }


    public function destroyTarifPendaftaran(Request $request, $id)
    {
        $pendaftaran = TarifPendaftaran::find($id);
        $pendaftaran->destroy($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/tarif/data-tarif-pendaftaran');

    }

    public function indexTarifTindakan(){
        $groupTarifTindakan = GroupTarifTindakan::all();
        return view('pages/tarif/tarif-tindakan/create-tarif-tindakan', ['title' => 'create-tarif-tindakan', 'groupTarifTindakan' => $groupTarifTindakan]);
    }

    public function storeTarifTindakan(Request $request){
        // return $request->all();

        $validatedData = $request->validate([
            'code_tarif_tindakan'       => [''],
            'nama_tarif_tindakan'       => ['required'],
            'group_tarif_id'            => ['required'],
            'fee_medis'                 => ['required'],
            'jasa_klinik'               => ['required'],
            'jasa_lainya'               => ['required'],
            'total_tarif'               => [''],
            'kode_tarif_bpjs'           => [''],
            'nama_tarif_tindakan_bpjs'  => ['']
        ]);
        if($request['fee_medis']){
            $validatedData['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $validatedData['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['jasa_lainya']){
            $validatedData['jasa_lainya'] = preg_replace('/[^\d.-]/', '',$request->jasa_lainya);
        }
        if($request['total_tarif'] == ''){
            $validatedData['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik) +  preg_replace('/[^\d.-]/', '',$request->jasa_lainya);
        }
        if($request['code_tarif_tindakan'] == ''){
            $validatedData['code_tarif_tindakan'] = $this->generateTtNumber();
        }
        $tindakan = TarifTindakan::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tarif/data-tarif-tindakan');
    }

    public function indexDataTarifTindakan(){
        $tindakan = TarifTindakan::all();
        return view('pages/tarif/tarif-tindakan/data-tarif-tindakan', ['title' => 'data-tarif-tindakan',  'tindakan' => $tindakan]);
    }
  
    public function editTarifTindakan($id){
        $groupTarifTindakan = GroupTarifTindakan::all();
        $tindakan = TarifTindakan::find($id);
        return view('pages/tarif/tarif-tindakan/edit-tarif-tindakan', ['title' => 'edit-tarif-tindakan',  'tindakan' => $tindakan, 'groupTarifTindakan' => $groupTarifTindakan]);
    }
    public function updateTarifTindakan(Request $request, $id){
        $groupTarifTindakan = GroupTarifTindakan::all();
        $request->validate([
            'nama_tarif_tindakan'       => ['required'],
            'group_tarif_id'            => ['required'],
            'fee_medis'                 => ['required'],
            'jasa_klinik'               => ['required'],
            'jasa_lainya'               => ['required'],
            'total_tarif'               => [''],
            'kode_tarif_bpjs'           => [''],
            'nama_tarif_tindakan_bpjs'  => ['']
        ]);
        if($request['fee_medis']){
            $request['fee_medis'] = preg_replace('/[^\d.-]/', '',$request->fee_medis);
        }
        if($request['jasa_klinik']){
            $request['jasa_klinik'] = preg_replace('/[^\d.-]/', '',$request->jasa_klinik);
        }
        if($request['jasa_lainya']){
            $request['jasa_lainya'] = preg_replace('/[^\d.-]/', '',$request->jasa_lainya);
        }
        if($request['total_tarif'] == ''){
            $request['total_tarif'] = preg_replace('/[^\d.-]/', '',$request->fee_medis) +  preg_replace('/[^\d.-]/', '',$request->jasa_klinik) +  preg_replace('/[^\d.-]/', '',$request->jasa_lainya);
        }
        $tindakan = TarifTindakan::find($id);
        $tindakan->update([
            'nama_tarif_tindakan'       => $request->nama_tarif_tindakan,
            'group_tarif_id'            => $request->group_tarif_id,
            'fee_medis'                 => $request->fee_medis,
            'jasa_klinik'               => $request->jasa_klinik,
            'jasa_lainya'               => $request->jasa_lainya,
            'total_tarif'               => $request->total_tarif,
            'kode_tarif_bpjs'           => $request->kode_tarif_bpjs,
            'nama_tarif_tindakan_bpjs'  => $request->nama_tarif_tindakan_bpjs
        ]);

        $request->session()->flash('success', 'Data berhasil dirubah');
        return redirect('tarif/data-tarif-tindakan');
    }

    public function destroyTarifTindakan(Request $request, $id)
    {
        $tindakan = TarifTindakan::find($id);
        $tindakan->destroy($id);
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/tarif/data-tarif-tindakan');

    }
}

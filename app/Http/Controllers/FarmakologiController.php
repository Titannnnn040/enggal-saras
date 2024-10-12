<?php

namespace App\Http\Controllers;

use App\Models\Farmakologi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FarmakologiController extends Controller
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
    public function indexDataFarmakologi()
    {
        $farmakologi = Farmakologi::latest();
        if (request('farmakologi_code')) {
            $this->filterData('farmakologi_code', $farmakologi);
        }
        if (request('farmakologi_name')) {
            $this->filterData('farmakologi_name', $farmakologi);
        }
        return view('pages.m_farmakologi.data-farmakologi', ['title' => 'data-farmakologi', 'farmakologi' => $farmakologi->get()]);
    }
    public function indexCreateFarmakologi()
    {
        return view('pages.m_farmakologi.create-farmakologi', ['title' => 'create-farmakologi']);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'farmakologi_name' => ['required', 'string', 'max:255', 'unique:m_farmakologi,farmakologi_name']
        ]);

        $createFarmakologi = Farmakologi::create([
            'farmakologi_code' => $this->generateCode(new Farmakologi, 'farmakologi_code', 'FM-'),
            'farmakologi_name' => strtoupper($request->farmakologi_name),
        ]);
        if (!$createFarmakologi) {
            return redirect()->route('create-farmakologi')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-farmakologi')->with('success', 'Data berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Farmakologi $farmakologi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $code)
    {
        $farmakologi = Farmakologi::where('farmakologi_code', $code)->first();
        return view('pages.m_farmakologi.edit-farmakologi', ['title' => 'edit-farmakologi', 'farmakologi' => $farmakologi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'farmakologi_name' => ['required', 'string', 'max:255', 'unique:m_farmakologi,farmakologi_name,' . $code . ',farmakologi_code']
        ]);

        $farmakologi = Farmakologi::where('farmakologi_code', $code)->update([
            'farmakologi_name' => strtoupper($request->farmakologi_name),
        ]);
        if (!$farmakologi) {
            return redirect()->route('edit-farmakologi', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-farmakologi')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request){
        $farmakologi = Farmakologi::where('farmakologi_code', $request->code)->delete();
        if (!$farmakologi) {
            return redirect()->route('data-farmakologi')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-farmakologi')->with('success', 'Data berhasil dihapus');
        }
    }
}

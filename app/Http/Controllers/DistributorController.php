<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DistributorController extends Controller
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

    public function indexDataDistributor()
    {
        $data = Distributor::latest();
        if (request('distributor_code')) {
            $this->filterData('distributor_code', $data);
        }
        if (request('distributor_name')) {
            $this->filterData('distributor_name', $data);
        }
        if (request('city')) {
            $this->filterData('city', $data);
        }
        return view('pages.m_distributor.data-distributor', ['title' => 'data-distributor', 'data' => $data->get()]);
    }
    
    public function indexCreateDistributor()
    {
        return view('pages.m_distributor.create-distributor', ['title' => 'create-distributor']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'distributor_name' => ['required', 'string', 'max:255'],
            'address'          => ['required', 'string', 'max:255'],
            'city'             => ['required', 'string', 'max:255'],
            'contact_person'   => ['required', 'string', 'max:255'],
            'phone_no'         => ['required', 'string', 'max:255'],
            'fax'           => ['required', 'string', 'max:255'],
        ]);

        $create = Distributor::create([
            'distributor_code' => $this->generateCode(new Distributor, 'distributor_code', 'DT-'),
            'distributor_name' => $request->distributor_name,
            'address'          => $request->address,
            'city'             => $request->city,
            'contact_person'   => $request->contact_person,
            'phone_no'         => $request->phone_no,
            'fax'              => $request->fax,
        ]);
        
        if (!$create) {
            return redirect()->route('create-distributor')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-distributor')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function edit($code)
    {
        $data = Distributor::where('distributor_code', $code)->first();
        return view('pages.m_distributor.edit-distributor', ['title' => 'distributor', 'data' => $data]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'distributor_name' => ['required', 'string', 'max:255'],
            'address'          => ['required', 'string', 'max:255'],
            'city'             => ['required', 'string', 'max:255'],
            'contact_person'   => ['required', 'string', 'max:255'],
            'phone_no'         => ['required', 'string', 'max:255'],
            'fax'           => ['required', 'string', 'max:255'],
        ]);

        $update = Distributor::where('distributor_code', $code)->update([
            'distributor_name' => $request->distributor_name,
            'address'          => $request->address,
            'city'             => $request->city,
            'contact_person'   => $request->contact_person,
            'phone_no'         => $request->phone_no,
            'fax'              => $request->fax,
            'updated_at'       => Carbon::now()
        ]);
        if (!$update) {
            return redirect()->route('edit-distributor', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-distributor')->with('success', 'Data berhasil diubah');
        }
    }
    public function destroy(request $request, $code)
    {
        $delete = Distributor::where('distributor_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-distributor')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-distributor')->with('success', 'Data berhasil dihapus');
        }
    }
}

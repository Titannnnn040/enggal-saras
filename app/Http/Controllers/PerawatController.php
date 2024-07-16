<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perawat;
use App\Http\Requests\StorePerawatRequest;
use App\Http\Requests\UpdatePerawatRequest;

class PerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return $request->all();
        // die;
        $validatedData = $request->validate([
            'nama_lengkap' => ['required', 'max:255'],
            'nik'          => ['required', 'numeric', 'digits:15']
        ]);
        
        Perawat::create($validatedData);
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/dashboard/perawat/data-perawat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        return view('m_perawat/create-perawat', ['title' => 'create-perawat']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Perawat $perawat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perawat $perawat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerawatRequest $request, Perawat $perawat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perawat $perawat)
    {
        //
    }
}

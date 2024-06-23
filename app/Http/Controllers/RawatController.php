<?php

namespace App\Http\Controllers;

use App\Models\Rawat;
use Illuminate\Http\Request;

class RawatController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $rawat = Rawat::all();
        return view('menu/rawat-jalan', ['title' => 'rawat-jalan']);
    }
    public function createPasien(Request $request)
    {
        // $rawat = Rawat::all();
        return view('menu/create-pasien', ['title' => 'create-pasien']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rawat $rawat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rawat $rawat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rawat $rawat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rawat $rawat)
    {
        //
    }
}

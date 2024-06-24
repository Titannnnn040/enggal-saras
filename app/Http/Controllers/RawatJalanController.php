<?php

namespace App\Http\Controllers;

use App\Models\Rawat_Jalan;
use Illuminate\Http\Request;

class RawatJalanController extends Controller
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
    public function createData(Request $request)
    {
        return $request->all();
        die;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('menu/rawat-jalan', ['title' => 'rawat-jalan']);
    }

    public function createPasien(Request $request){
        return view('menu/create-pasien', ['title' => 'create-pasien']);
    }
    /**
     * Display the specified resource.
     */
    public function show(Rawat_Jalan $rawat_Jalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rawat_Jalan $rawat_Jalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rawat_Jalan $rawat_Jalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rawat_Jalan $rawat_Jalan)
    {
        //
    }
}

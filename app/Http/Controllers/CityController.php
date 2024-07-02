<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Kecamatan;
use Illuminate\Http\Request;


class CityController extends Controller
{
    public function getKecamatanByCity($cityId)
    {
        $cities = City::where('id', $cityId)->first();
        $kecamatan = $cities ? Kecamatan::where('city_id', $cities->id)->get() : [];
        return response()->json($kecamatan);
    }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}

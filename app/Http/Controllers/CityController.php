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
        $kecamatan = $cities ? Kecamatan::where('regency_id', $cities->id)->get() : [];
        return response()->json($kecamatan);
    }
}

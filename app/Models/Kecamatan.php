<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rawat_Jalan;
use App\Models\City;
use App\Models\Kelurahan;

class Kecamatan extends Model
{
    use HasFactory;

    public function Rawat_Jalan(){
        return $this->hasMany(Rawat_Jalan::class);
    }

    public function City(){
        return $this->belongsTo(City::class);
    }

    public function Kelurahan(){
        return $this->hasMany(Kelurahan::class);
    }
}

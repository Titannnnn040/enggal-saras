<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Rawat_Jalan;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    
    public function City(){
        return $this->hasMany(City::class);
    }

    public function Rawat_Jalan(){
        return $this->hasMany(Rawat_Jalan::class);
    }
}

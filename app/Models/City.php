<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rawat_Jalan;
use App\Models\Province;
use App\Models\Kecamatan;

class City extends Model
{
    use HasFactory;
    protected $table = 'regencies';
    public function Rawat_Jalan(){
        return $this->hasMany(Rawat_Jalan::class);
    }

    public function Province(){
        return $this->belongsTo(Province::class);
    }
    
    public function Kecamatan(){
        return $this->hasMany(Kecamatan::class, 'regency_id', 'id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rawat_Jalan;
use App\Models\Kecamatan;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'villages';
    public function Rawat_Jalan(){
        return $this->hasMany(Rawat_Jalan::class);
    }

    public function Kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id', 'district_id');
    }
}

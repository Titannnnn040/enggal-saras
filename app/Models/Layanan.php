<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dokter;
use App\Models\JenisLayanan;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'm_layanan';
    protected $guarded=['id'];

    public function Dokter(){
        return $this->hasMany(Dokter::class);
    }
    public function JenisLayanan(){
        return $this->belongsTo(JenisLayanan::class);
    }

    public function PenjadwalanDokter(){
        return $this->hasMany(PenjadwalanDokter::class);
    }
    public function ReservasiPasien(){
        return $this->hasMany(ReservasiPasien::class);
    }
}

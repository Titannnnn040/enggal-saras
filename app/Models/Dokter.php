<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Layanan;
class Dokter extends Model
{
    use HasFactory;
    protected $table = 'm_dokter';
    protected $guarded=['id'];

    public function Layanan(){
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
    public function JadwalDokter(){
        return $this->hasMany(PenjadwalanDokter::class, 'layanan_id', 'id');
    }
}

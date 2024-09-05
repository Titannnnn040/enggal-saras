<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Layanan;
class Dokter extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'm_dokter';
    protected $guarded=['id'];
    protected $primaryKey = 'id';
    
    // Tentukan tipe primary key
    protected $keyType = 'string';

    // Nonaktifkan auto-increment karena UUID bukan integer
    public $incrementing = false;

    public function Layanan(){
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
    public function JadwalDokter(){
        return $this->hasMany(PenjadwalanDokter::class, 'layanan_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjadwalanDokter extends Model
{
    use HasFactory;

    protected $table = 'm_schedule_dokter';
    protected $fillable = [
        'layanan_id',
        'dokter_id',
        'jadwal_praktik',
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
        'sabtu',
        'minggu',
        'start',
        'finish'
    ];

    public function Layanan(){
        return $this->belongsTo(Layanan::class);
    }
    public function Dokter(){
        return $this->belongsTo(Dokter::class);
    }
}
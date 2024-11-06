<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesifikasiObat extends Model
{
    use HasFactory;
    protected $table = 'm_detail_spesifikasi_obat';
    protected $fillable = [
        'code_obat',
        'dosis',
        'interaksi_obat',
        'isi_kandungan',
        'cara_kerja_obat',
        'indikasi',
        'kontraindikasi',
        'peringatan',
        'farmakologi',
        'created_at',
        'updated_at'
    ];
}

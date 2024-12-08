<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanLab extends Model
{
    use HasFactory;
    protected $table = 'm_pemeriksaan_lab';
    protected $fillable =[
        'uuid',
        'code',
        'name',
        'jenis',
        'kelompok',
        'satuan',
        'keterangan',
        'hasil_rahasia',
        'tipe',
        'updated_at',
        'created_by',
        'created_at',
        'deleted_by',
        'deleted_at'
    ];
}

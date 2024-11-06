<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesifikasiDasarObat extends Model
{
    use HasFactory;
    protected $table = 'm_spesifikasi_dasar_obat';
    protected $fillable = [
        'code_obat',
        'status',
        'barang_racikan',
        'golongan_barang',
        'pabrik_principal',
        'lokasi_barang',
        'updated_by',
        'updated_at',
        'created_by',
        'created_at',
        'deleted_by',
        'deleted_at'
    ];
}

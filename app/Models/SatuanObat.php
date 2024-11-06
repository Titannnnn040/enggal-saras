<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanObat extends Model
{
    use HasFactory;
    protected $table = 'm_satuan_obat';
    protected $fillable = [
        'code_obat',
        'satuan_kecil',
        'satuan_kemasan',
        'qty_satuan_kemasan',
        'satuan_kemasan_lainya',
        'qty_satuan_kemasan_lainya',
        'satuan_racik',
        'qty_satuan_racik',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;
    protected $table = 'm_satuan_barang';
    protected $guraded = [
        'id'
    ];
    protected $fillable = [
        'satuan_barang_code',
        'satuan_barang_name'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLimitObat extends Model
{
    use HasFactory;
    protected $table = 'm_stock_limit_obat';
    protected $fillable = [
        'code_obat',
        'kode_layanan',
        'nama_layanan',
        'minimal_stock',
        'maximal_stock',
        'stock_aktual',
        'created_at',
        'updated_at'
    ];
}

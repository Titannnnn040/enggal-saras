<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataHargaObat extends Model
{
    use HasFactory;
    protected $table = 'm_data_harga_obat';
    protected $fillable =[
        'code_obat',
        'default_tax',
        'metode_penentuan_harga_jual',
        'metode_persediaan',
        'updated_by',
        'updated_at',
        'created_by',
        'created_at',
        'deleted_by',
        'deleted_at'
    ];
}

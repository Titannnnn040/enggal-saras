<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingHargaObat extends Model
{
    use HasFactory;
    protected $table = 'm_setting_harga_obat';
    protected $fillable = [
        'code_obat',
        'default_tax',
        'metode_penentuan_harga_jual',
        'metode_persediaan',
        'created_by',
        'edited_by',
        'deleted_by', 
        'deleted_at', 
        'created_at', 
        'updated_at'
    ];
}

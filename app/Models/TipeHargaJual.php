<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeHargaJual extends Model
{
    use HasFactory;
    protected $table = 'm_tipe_harga_jual';
    protected $fillable = ['tipe_harga_jual_code', 'tipe_harga_jual_name', 'edit_harga'];
}

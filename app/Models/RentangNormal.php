<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentangNormal extends Model
{
    use HasFactory;
    protected $table = 't_rentang_normal';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'name', 'satuan_umur', 'batas_bawah', 'batas_atas', 'gender', 'batas_bawah_hari', 'batas_atas_hari'];
}

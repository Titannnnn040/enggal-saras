<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTestLabKualitatifKhusus extends Model
{
    use HasFactory;
    protected $table = 't_lab_kualitatif_khusus';
    protected $fillable =[
        'uuid_test',
        'rentang_normal',
        'normal',
        'keterangan_tidak_normal',
        'narasi',
        'skala',
        'keterangan_normal',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

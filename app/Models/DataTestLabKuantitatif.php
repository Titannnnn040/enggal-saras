<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTestLabKuantitatif extends Model
{
    use HasFactory;
    protected $table = 't_lab_kuantitatif';
    protected $fillable =[
        'uuid_test',
        'rentang_normal',
        'keterangan1',
        'batas_bawah',
        'antara',
        'batas_atas',
        'keterangan2',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

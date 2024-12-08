<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTestLabKualitatif extends Model
{
    use HasFactory;
    protected $table = 't_lab_kualitatif';
    protected $fillable =[
        'uuid_test',
        'rentang_normal',
        'keterangan_positif',
        'n_plus',
        'keterangan_negatif',
        'n_min',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

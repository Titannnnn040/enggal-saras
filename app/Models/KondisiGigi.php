<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiGigi extends Model
{
    use HasFactory;
    protected $table = 't_kondisi_gigi';
    protected $guarded = ['uuid'];
    protected $fillable = [
        'uuid',
        'code',
        'jenis',
        'arti',
        'keterangan',
        'warna'
    ];
}

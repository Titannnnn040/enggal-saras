<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatBpjs extends Model
{
    use HasFactory;
    protected $table = 'm_obat_bpjs';
    protected $guraded = [
        'id'
    ];
    protected $fillable = [
        'code_obat',
        'code_obat_dpoh'
    ];
}

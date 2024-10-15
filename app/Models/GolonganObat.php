<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganObat extends Model
{
    use HasFactory;
    protected $table = 'm_golongan_obat';
    protected $fillable = ['golongan_obat_code', 'golongan_obat_name'];
    protected $guarded = ['id'];
}

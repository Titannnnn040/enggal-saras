<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokLab extends Model
{
    use HasFactory;
    protected $table = 't_kelompok_lab';
    protected $fillable = ['code', 'kelompok'];
}

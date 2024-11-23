<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanLab extends Model
{
    use HasFactory;
    protected $table = 't_satuan_lab';
    protected $primaryKey = 'id';
    protected $fillable = ['code', 'satuan'];
}

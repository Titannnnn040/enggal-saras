<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentangUmur extends Model
{
    use HasFactory;
    protected $table = 't_rentang_umur';
    protected $primaryKey = 'id';
    protected $fillable = ['waktu', 'jenis', 'konversi'];
}

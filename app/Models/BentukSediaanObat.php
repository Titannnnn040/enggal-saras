<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukSediaanObat extends Model
{
    use HasFactory;
    protected $table = 'm_bentuk_sediaan_obat';
    protected $fillable = ['bentuk_sediaan_code', 'bentuk_sediaan_name'];
    protected $guarded = ['id'];
}

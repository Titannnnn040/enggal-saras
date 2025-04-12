<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiPasienLuar extends Model
{
    use HasFactory;
    protected $table = 'm_registrasi_pasien_luar';
    protected $fillable = ['regist_code', 'patient', 'address', 'dob', 'jaminan', 'layanan', 'dokter', 'created_at', 'updated_at'];
}

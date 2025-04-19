<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerRekamMedis extends Model
{
    use HasFactory;
    protected $table = 't_tracer_rekam_medis';
    protected $fillable = ['patient',
    'pinjam',
    'penanggung_jawab',
    'date',
    'time',
    'dokter',
    'tracer_code',
    'status'];
}

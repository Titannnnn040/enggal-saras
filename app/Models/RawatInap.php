<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;
    protected $table = 'm_rawat_inap';
    protected $guarded = ['id'];
    protected $fillable = [
        'rawat_inap_code',
        'regist_code',
        'no_reservasi',
        'no_antrian',
        'no_rm',
        'pasien_name',
        'jaminan',
        'layanan_id',
        'dokter_code',
        'perawat_code',
        'no_bpjs',
        'tarif_pendaftaran',
        'biaya',
        'jam_praktek',
        'keterangan_rujukan',
        'jenis_kunjungan',
        'saturasi_oksigen',
        'suhu',
        'tinggi_badan',
        'berat_badan',
        'lingkar_perut',
        'imt',
        'keluhan',
        'sistole',
        'diastole',
        'respiratory_rate',
        'heart_rate',
        'lingkar_kepala'
    ];
}

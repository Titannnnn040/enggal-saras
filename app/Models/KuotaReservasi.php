<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaReservasi extends Model
{
    use HasFactory;
    protected $table = 't_kuota_reservasi';
    protected $guarded=['id'];
}

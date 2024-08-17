<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPendaftaran extends Model
{
    use HasFactory;
    
    protected $table = 'm_tarif_pendaftaran';
    protected $guarded = ['id'];
}

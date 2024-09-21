<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanRawatInap extends Model
{
    use HasFactory;
    protected $table = 'm_tindakan_rawat_inap';
    protected $guarded = ['id'];
}

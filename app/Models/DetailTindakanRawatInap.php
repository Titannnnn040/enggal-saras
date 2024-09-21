<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTindakanRawatInap extends Model
{
    use HasFactory;
    protected $table = 'm_detail_tindakan_rawat_inap';
    protected $guarded = ['id'];
}

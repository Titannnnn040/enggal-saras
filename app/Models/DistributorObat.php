<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorObat extends Model
{
    use HasFactory;
    protected $table = 'm_distributor_obat';
    protected $fillable = [
        'code_obat',
        'distributor_code',
        'distributor_name',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TarifRadiologi extends Model
{
    use HasFactory;
    protected $table = 'm_tarif_radiologi';
    protected $guarded = ['id'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifKamar extends Model
{
    use HasFactory;

    protected $table = 'm_kamar';
    protected $guarded = [
        'id'
    ];

}

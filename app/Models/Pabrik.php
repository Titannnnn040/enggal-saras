<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabrik extends Model
{
    use HasFactory;
    protected $table = 'm_pabrik';
    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'pabrik_code',
        'pabrik_name'
    ];
}

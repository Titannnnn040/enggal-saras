<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmakologi extends Model
{
    use HasFactory;
    protected $table = 'm_farmakologi';
    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'farmakologi_code',
        'farmakologi_name',
    ];
}

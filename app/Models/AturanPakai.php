<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturanPakai extends Model
{
    use HasFactory;
    protected $table = 'm_aturan_pakai';
    protected $fillable = ['aturan_pakai_code', 'aturan_pakai_name'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaraPakaiObat extends Model
{
    use HasFactory;
    protected $table = 'm_cara_pakai';
    protected $fillable = ['cara_pakai_code', 'cara_pakai_name'];
    protected $guarded = ['id'];
}

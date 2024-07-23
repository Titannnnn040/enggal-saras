<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Layanan;

class JenisLayanan extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_layanan';

    public function Layanan(){
        return $this->hasMany(Layanan::class);
    }
}

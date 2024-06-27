<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Kecamatan;

class City extends Model
{
    use HasFactory;

    public function Province(){
        return $this->belongsTo(Province::class);
    }
    
    public function Kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    
}

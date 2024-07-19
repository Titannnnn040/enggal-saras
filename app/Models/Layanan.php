<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dokter;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'm_layanan';
    protected $guarded=['id'];

    public function Dokter(){
        return $this->hasMany(Dokter::class);
    }
}

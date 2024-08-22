<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rawat_Jalan;

class Payment_Method extends Model
{
    use HasFactory;
    protected $table = 'm_payment';
    // public function Rawat_Jalan(){
    //     echo "Hello";
    //     die;
    //     return $this->hasMany(Rawat_Jalan::class);
    // }

    public function rawat_jalan(){
        return $this->hasMany(Rawat_Jalan::class);
    }

}

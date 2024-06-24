<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment_Method;

class Rawat_Jalan extends Model
{
    use HasFactory;
    protected $table = 'rawat_jalan';
    // public function Payment_Method(){
    //     return $this->belongsTo(Payment_Method::class);
    // }

    protected $guarded=['id'];
    
    public function payment_method(){
        return $this->belongsTo(Payment_Method::class, 'payment_id', 'id');
    }
}

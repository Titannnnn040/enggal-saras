<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment_Method;
use App\Models\Province;
use App\Models\City;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class Rawat_Jalan extends Model
{
    use HasFactory;
    protected $table = 'm_pasien';

    protected $guarded=['id'];
    
    public function payment_method(){
        return $this->belongsTo(Payment_Method::class, 'payment_id',  'id');
    }

    public function Province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
    public function City(){
        return $this->belongsTo(City::class, 'cities_id', 'id');
    }
    public function Kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
    public function Kelurahan(){
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }
}

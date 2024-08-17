<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'm_kamar';

    protected $guarded = ['id'];

    protected $fillable = ['tarif_kamar', 'jasa_pelaksana', 'total_tarif', 'kode_kamar', 'nama_kamar', 'jenis_kamar', 'jumlah_bed', 'status'];

    public function Bed(){
        return $this->hasMany(Bed::class);
    }
}

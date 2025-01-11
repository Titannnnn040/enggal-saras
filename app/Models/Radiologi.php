<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radiologi extends Model
{
    use HasFactory;
    protected $table = 't_template_ro';
    protected $guarded = ['uuid'];
    protected $fillable = [
        'uuid',
        'dokter_code',
        'template_name',
        'content'
    ];

    public function dokter(){
        return $this->belongsTo(Dokter::class, 'dokter_code', 'no_dokter');
    }
}

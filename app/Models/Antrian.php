<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $table = 't_patient_queue';
    protected $fillable = [
        'patient_name' ,
        'type',
        'date',
        'time',
        'queue',
        'call_time',
        'duration',
        'status'
    ];
}

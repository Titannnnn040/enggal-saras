<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuSehatObat extends Model
{
    use HasFactory;
    protected $table = 'm_satu_sehat_obat';
    protected $fillable = ['code_obat', 'code_kfa_variant', 'code_kfa_product', 'code_kfa_ingredient', 'cara_pakai', 'pola_pemberian', 'bentuk_sediaan_obat'];
    protected $guarded = ['id'];
}

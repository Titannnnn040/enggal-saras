<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'm_obat';
    protected $fillable = ['code_obat', 'name_obat', 'created_by', 'edited_by', 'deleted_by', 'deleted_at', 'created_at', 'updated_at'];
    protected $guarded = ['id'];
}

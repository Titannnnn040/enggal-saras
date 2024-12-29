<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateLab extends Model
{
    use HasFactory;
    protected $table = 't_template_lab';
    protected $fillable = ['uuid', 'name', 'content', 'default'];
}

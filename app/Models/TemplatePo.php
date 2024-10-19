<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplatePo extends Model
{
    use HasFactory;
    protected $table = 'm_template_po';
    protected $fillable = ['template_po_code', 'template_po_name', 'desc'];
}

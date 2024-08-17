<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTarifTindakan extends Model
{
    use HasFactory;
    protected $table = 'm_group_tarif_tindakan';
    protected $guarded = ['id'];
}

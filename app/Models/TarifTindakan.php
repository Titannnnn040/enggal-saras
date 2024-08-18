<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupTarifTindakan;

class TarifTindakan extends Model
{
    use HasFactory;
    protected $table = 'm_tarif_tindakan';
    protected $guarded = ['id'];

    public function GroupTarifTindakan(){
        return $this->belongsTo(GroupTarifTindakan::class, 'group_tarif_id', 'id');
    }
}

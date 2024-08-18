<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TarifTindakan;

class GroupTarifTindakan extends Model
{
    use HasFactory;
    protected $table = 'm_group_tarif_tindakan';
    protected $guarded = ['id'];

    public function TarifTindakan(){
        return $this->hasMany(TarifTindakan::class);
    }
}

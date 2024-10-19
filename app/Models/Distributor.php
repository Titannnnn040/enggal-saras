<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $table = 'm_distributor';
    protected $fillable = ['distributor_code', 'distributor_name', 'address', 'city', 'contact_person', 'phone_no', 'fax'];
}

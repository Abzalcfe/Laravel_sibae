<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance_mensual extends Model
{
    public $timestamps = false;
    protected $table = 'balance_mensual';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id');
    }
}

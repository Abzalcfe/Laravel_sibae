<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance_am_mt extends Model
{
    protected $table = 'balance_am_mt';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id')->select('fecha');
    }
}

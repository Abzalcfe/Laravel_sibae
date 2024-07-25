<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas_totales extends Model
{
    public $timestamps = false;
    protected $table = 'ventas_totales';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id');
    }
}

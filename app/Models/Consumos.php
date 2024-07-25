<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumos extends Model
{
    public $timestamps = false;
    protected $table = 'consumo';

    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id')->select('fecha');
    }
    public function circuito()
    {
        return $this->belongsTo(Circuitos::class, 'id_circuito', 'id_circuito')->select('nombre');
    }
}
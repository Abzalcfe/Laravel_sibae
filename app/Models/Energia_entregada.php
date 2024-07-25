<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energia_entregada extends Model
{
    public $timestamps = false;
    protected $table = 'energia_entregada';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id')->select('fecha');
    }
    public function punto()
    {
        return $this->belongsTo(Puntos::class, 'id_punto', 'id');
    }
}

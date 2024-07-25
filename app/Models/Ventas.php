<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public $timestamps = false;

    protected $table = 'ventas';


    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id');
    }

    public function tarifa()
    {
        return $this->belongsTo(Tarifas::class, 'id_tarifa', 'id');
    }
}

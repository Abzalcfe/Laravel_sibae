<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E_e_mt extends Model
{
    public $timestamps = false;
    protected $table = 'e_e_mt';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id')->select('fecha');
    }
    public function zona()
    {
        return $this->belongsTo(Zona_ee_mt::class, 'id_zona', 'id');
    }
}

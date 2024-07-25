<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class E_r_mt extends Model
{
    public $timestamps = false;
    protected $table = 'e_r_mt';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id')->select('fecha');
    }
    public function zona()
    {
        return $this->belongsTo(Zona_er_mt::class, 'id_zona', 'id');
    }
}

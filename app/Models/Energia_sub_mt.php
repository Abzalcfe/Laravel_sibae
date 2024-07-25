<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Energia_sub_mt extends Model
{
    public $timestamps = false;
    protected $table = 'energia_sub_mt';

    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id');
    }

    public function cipe()
    {
        return $this->belongsTo(Cipes_mt::class, 'id_cipe', 'id');
    }

    public function subestacion()
    {
        return $this->belongsTo(Subestaciones::class, 'id_sub', 'id');
    }
}

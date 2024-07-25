<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    public $timestamps = false;

    protected $table = 'puntos';
    public function energiaRecibida()
    {
        return $this->hasMany(Energia_recibida::class, 'id_punto', 'id');
    }
    public function energiaEntregada()
    {
        return $this->hasMany(Energia_entregada::class, 'id_punto', 'id');
    }
}

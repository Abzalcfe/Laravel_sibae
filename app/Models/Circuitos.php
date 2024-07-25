<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuitos extends Model
{
    public $timestamps = false;

    protected $table = 'circuito';
    public function consumo()
    {
        return $this->hasMany(Consumos::class, 'id_circuito', 'id_circuito');
    }
}

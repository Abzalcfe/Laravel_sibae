<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifas extends Model
{
    protected $table = 'tarifas';
    public $timestamps = false;

    public function ventas()
    {
        return $this->hasMany(Ventas::class, 'id_tarifa', 'id');
    }
}

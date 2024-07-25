<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fechas extends Model
{
    protected $table = 'fechas';

    public function energiaRecibida()
    {
        return $this->hasOne(Energia_recibida::class, 'id_fecha', 'id');
    }
    public function energiaEntregada()
    {
        return $this->hasOne(Energia_entregada::class, 'id_fecha', 'id');
    }
    public function balanceMensual()
    {
        return $this->hasMany(Balance_mensual::class, 'id_fecha', 'id');
    }
    public function ventas()
    {
        return $this->hasOne(Ventas::class, 'id_fecha', 'id');
    }
    public function ventasTotales()
    {
        return $this->hasMany(Ventas_totales::class, 'id_fecha', 'id');
    }
    public function e_r_mt()
    {
        return $this->hasOne(E_r_mt::class, 'id_fecha', 'id');
    }
    public function e_e_mt()
    {
        return $this->hasOne(E_e_mt::class, 'id_fecha', 'id');
    }
    public function energia_sub_mt()
    {
        return $this->hasOne(Energia_sub_mt::class, 'id_fecha', 'id');
    }
    public function balanceMediaTension(){
        return $this->hasMany(Balance_media_tension::class, 'id_fecha', 'id');
    }
    public function balanceAmMt(){
        return $this->hasMany(Balance_am_mt::class, 'id_fecha', 'id');
    }
    public function consumos()
    {
        return $this->hasOne(Consumos::class, 'id_fecha', 'id');
    }
}

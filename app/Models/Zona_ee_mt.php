<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona_ee_mt extends Model
{
    public $timestamps = false;

    protected $table = 'zona_ee_mt';
    public function e_e_mt()
    {
        return $this->hasMany(E_e_mt::class, 'id_zona', 'id');
    }
}

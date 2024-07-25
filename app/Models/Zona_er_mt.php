<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Zona_er_mt extends Model
{
    public $timestamps = false;
    
    protected $table = 'zona_er_mt';
    public function e_r_mt()
    {
        return $this->hasMany(E_r_mt::class, 'id_zona', 'id');
    }
}

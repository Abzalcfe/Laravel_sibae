<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance_media_tension extends Model
{
    protected $table = 'balance_media_tension';
    public function fecha()
    {
        return $this->belongsTo(Fechas::class, 'id_fecha', 'id');
    }
}

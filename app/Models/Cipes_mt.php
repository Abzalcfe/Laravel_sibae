<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Cipes_mt extends Model
{
    protected $table = 'cipes_mt';

    public function subestacion()
    {
        return $this->hasOne(Subestaciones::class, 'id', 'id_cipe');
    }
}

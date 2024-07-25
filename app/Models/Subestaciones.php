<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subestaciones extends Model
{
    protected $table = 'subestaciones';

    public function energia_sub_mt()
    {
        return $this->hasMany(Energia_sub_mt::class, 'id_sub', 'id');
    }

    public function cipes_mt()
    {
        return $this->belongsTo(Cipes_mt::class, 'id', 'id_cipe');
    }
}

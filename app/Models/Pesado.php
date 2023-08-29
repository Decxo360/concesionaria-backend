<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehiculo;

class Pesado extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable=[
        "hp",
        "traccion",
        "turbo_inter_after",
        "tipo_frenos",
        "otros_frenos",
        "caja",
        "equipo",
        "largo",
        "ancho",
        "capacidad",
        "direccionales",
        "traccionales",
    ];

    public function vehiculo(){
       return $this->belongsTo(Vehiculo::Class, "idvehiculo");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehiculo;

class Liviano extends Model
{
    use HasFactory;
    protected $table = "livianos";

    protected $primaryKey ="idliviano";

    protected $hidden = ["idvehiculo"];

    protected $fillable = [
        "transmision",
        "direccion",
        "cierre_centralizado",
        "alarma",
        "aire_acondicionado",
        "radio",
        "alza_vidrios",
        "espejos_electricos",
        "frenos_abs",
        "airbags",
        "techo",
    ]
;
    public $timestamps=false;

    public function vehiculo(){
        return $this -> belongsTo(Vehiculo::class,"idvehiculo");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dueno;
use App\Models\Usuario;
use App\Models\Modelo;
use App\Models\Color;


class Vehiculo extends Model
{
    use HasFactory;

    public $timestamps=false;

    //Como se llama la primary key del tabla vehiculo
    protected $primaryKey = "idvehiculo";

    //Variables que no quiero visualizar al utilizar un metodo GET
    protected $hidden = ["idusuario","idcolor","iddueno","idmodelo"];

    // Elementos que puede ser asignados masivamente
    protected $fillable= [
        "idcolor",
        "tipo",
        "ano",
        "cc",
        "kilometros",
        "revtecnica",
        "llantas",
        "otros",
        "patente",
        "costo",
        "gasto",
        "comision",
        "valor_venta",
        "valor",
        "estado",
        "comustible"
    ];

    //Relaciones

    //relaciones belongsTo -> pertenece a. Ejemplo: este vehiculo pertenece a un dueno
    public function dueno(){
        return $this -> belongsTo(Dueno::class,"iddueno");
    }
    public function usuario(){
        return $this -> belongsTo(Usuario::class,"idusuario");
    }
    public function modelo(){
        return $this -> belongsTo(Modelo::class,"idmodelo");
    }
    public function color(){
        return $this -> belongsTo(Color::class,"idcolor");
    }

}

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
    protected $primaryKey = "idvehiculo";
    protected $hidden = ["idusuario","idcolor","iddueno","idmodelo"];

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

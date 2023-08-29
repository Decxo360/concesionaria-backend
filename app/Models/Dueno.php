<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    use HasFactory;

    protected $primaryKey = "iddueno";

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
    ];

    public $timestamps=false;
}

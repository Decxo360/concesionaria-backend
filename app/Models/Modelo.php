<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marcas;

class Modelo extends Model
{
    use HasFactory;
    protected $primaryKey = "idmodelo";
    public $timestamps=false;
    
    public function marca(){
        return $this->belongsTo(Marcas::class,"idmarca");
    }
}

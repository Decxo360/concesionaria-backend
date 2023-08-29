<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id("idvehiculo");
            $table->foreign('idusuario').references('idusuario')->on('usuarios');
            $table->foreign('idmodelo').references('idmodelo')->on('modelos');
            $table->foreign('iddueno').references('iddueno')->on('duenos');
            $table->foreign('idcolor').references('idcolor')->on('colores');
            $table->string('tipo',45);
            $table->tinyInteger('ano');
            $table->double('cc');
            $table->tinyInteger('kilometros');
            $table->tinyInteger('revtecnica');
            $table->string('llantas',45);
            $table->text('otros');
            $table->string('patente',45);
            $table->date('fecha_registro');
            $table->integer('costo');
            $table->integer('gasto');
            $table->integer('comision');
            $table->integer('valor_venta');
            $table->date('fecha_ultimo_contacto');
            $table->integer('valor');
            $table->tinyInteger('estado');
            $table->tinyInteger('combustible');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}

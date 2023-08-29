<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesados', function (Blueprint $table) {
            $table->id('idpesado');
            $table->foreign('idvehciulo').references('idvehiculo')->on('vehiculos');
            $table->integer('hp');
            $table->string('traccion',45);
            $table->tinyInteger('turbo_inter_after');
            $table->tinyInteger('tipo_frenos');
            $table->string('otros_frenos',45);
            $table->string('caja',45);
            $table->string('equipo',45);
            $table->double('largo');
            $table->double('ancho');
            $table->string('capacidad',45);
            $table->tinyInteger('direccionales');
            $table->tinyInteger('traccionales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesados');
    }
}

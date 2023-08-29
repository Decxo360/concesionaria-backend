<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivianosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livianos', function (Blueprint $table) {
            $table->id('idliviano');
            $table->foreign('idvehiculo').references('idvehiculo').on('vehiculos');
            $table->tinyInteger('transmision');
            $table->string('direccion',45);
            $table->tinyInteger('cierre_centralizado');
            $table->tinyInteger('alarma');
            $table->tinyInteger('aire_acondicionado');
            $table->tinyInteger('radio');
            $table->tinyInteger('alza_vidrios');
            $table->tinyInteger('espejos_electricos');
            $table->tinyInteger('frenos_abs');
            $table->tinyInteger('airbags');
            $table->tinyInteger('techo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livianos');
    }
}

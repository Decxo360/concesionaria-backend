<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duenos', function (Blueprint $table) {
            $table->id('iddueno');
            $table->string('nombre',200);
            $table->string('direccion',60);
            $table->string('fono_fijo',45);
            $table->string('celular',45);
            $table->string('correo',200);
            $table->string('origen',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duenos');
    }
}

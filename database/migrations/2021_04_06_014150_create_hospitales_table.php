<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitales', function (Blueprint $table) {
            $table->id('hos_id');
            $table->string('hos_nombre');
            $table->string('hos_clave');
            $table->string('hos_localidad');
            $table->string('hos_descripcion');
            $table->string('hos_direccion');
            $table->integer('hos_telefono');
            $table->time('hos_horario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitales');
    }
}

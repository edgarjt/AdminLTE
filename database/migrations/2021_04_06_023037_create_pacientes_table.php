<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('pac_id');
            $table->string('pac_nombre')->nullable();
            $table->string('pac_apellidos')->nullable();
            $table->integer('pac_edad')->nullable();
            $table->string('pac_sexo');
            $table->string('pac_fallecido')->nullable();
            $table->unsignedBigInteger('hos_fk_id');
            $table->timestamps();
            $table->foreign('hos_fk_id')->references('hos_id')->on('hospitales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}

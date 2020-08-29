<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('ser_id');
            $table->integer('ser_total');
            $table->unsignedBigInteger('fk_enf_id');
            $table->unsignedBigInteger('fk_eme_id');
            $table->unsignedBigInteger('fk_sub_id');
            $table->foreign('fk_enf_id')->references('enf_id')->on('enfermedades');
            $table->foreign('fk_eme_id')->references('eme_id')->on('emergencias');
            $table->foreign('fk_sub_id')->references('sub_id')->on('subdelegaciones');
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
        Schema::dropIfExists('servicios');
    }
}

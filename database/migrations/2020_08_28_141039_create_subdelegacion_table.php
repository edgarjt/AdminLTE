<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubdelegacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdelegaciones', function (Blueprint $table) {
            $table->id('sub_id');
            $table->string('sub_nombre');
            $table->string('sub_descripcion');
            $table->string('sub_calle');
            $table->unsignedBigInteger('fk_mun_id');
            $table->foreign('fk_mun_id')->references('mun_id')->on('municipios');
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
        Schema::dropIfExists('subdelegacion');
    }
}

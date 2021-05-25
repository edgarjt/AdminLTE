<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->id('bit_id');
            $table->time('bit_hora_llamada');
            $table->time('bit_hora_salida');
            $table->time('bit_hora_llegada');
            $table->string('bit_num_ambulancia');
            //Si se requiere traslado
            $table->time('bit_hora_traslado')->nullable();
            $table->time('bit_llegada_hospital')->nullable();
            $table->time('bit_llegada_base')->nullable();
            //Detalles
            $table->string('bit_nombre_operador');
            $table->string('bit_nombre_paramedico');
            $table->string('bit_dir_servicio');
            $table->integer('bit_km_salida_base');
            $table->integer('bit_km_llegada_base');
            $table->string('bit_folio_frap');
            $table->string('bit_folio_c4');
            $table->integer('bit_tel_reporte');
            $table->string('bit_situacion_traslado');
            $table->integer('bit_veces_atendido');
            $table->unsignedBigInteger('tip_servicio_fk_id');
            $table->unsignedBigInteger('delegacion_fk_id');
            $table->unsignedBigInteger('pac_fk_id');

            $table->timestamps();

            $table->foreign('tip_servicio_fk_id')->references('cla_id')->on('clave_servicio');
            $table->foreign('delegacion_fk_id')->references('del_id')->on('delegaciones');
            $table->foreign('pac_fk_id')->references('pac_id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}

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
            $table->id();
            $table->time('hora_llamada');
            $table->time('hora_salida');
            $table->time('hora_llegada');
            $table->string('num_ambulancia');
            $table->unsignedBigInteger('tip_servicio');
            $table->string('fallecido')->nullable();
            //Paciente
            $table->string('nombre_paciente')->nullable();
            $table->string('apellidos_paciente')->nullable();
            $table->string('edad_paciente')->nullable();
            $table->string('sexo_paciente')->nullable();
            //Si se requiere traslado
            $table->time('hora_traslado')->nullable();
            $table->string('hospital_traslado')->nullable();
            $table->time('llegada_hospital')->nullable();
            $table->time('llegada_base')->nullable();
            //Detalles
            $table->string('nombre_operador');
            $table->string('nombre_paramedico');
            $table->string('dir_servicio');
            $table->string('km_salida_base');
            $table->string('km_llegada_base');
            $table->string('folio_frap');
            $table->string('folio_c4');
            $table->string('tel_reporte');
            $table->string('situacion_traslado');
            $table->integer('veces_atendido');
            $table->timestamps();

            $table->foreign('tip_servicio')->references('id')->on('clave_servicio');
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

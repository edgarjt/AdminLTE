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
            $table->string('pac_nombre');
            $table->string('pac_apellidos');
            $table->integer('pac_estado');
            $table->unsignedBigInteger('fk_sub_id');
            $table->unsignedBigInteger('fk_enf_id');
            $table->unsignedBigInteger('fk_eme_id');
            $table->unsignedBigInteger('fk_use_id');
            $table->foreign('fk_sub_id')->references('sub_id')->on('subdelegaciones')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_enf_id')->references('enf_id')->on('enfermedades')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_eme_id')->references('eme_id')->on('emergencias')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_use_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            //$table->timestamps();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
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

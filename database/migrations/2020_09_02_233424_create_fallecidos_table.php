<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallecidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fallecidos', function (Blueprint $table) {
            $table->id('fal_id');
            $table->unsignedBigInteger('fk_pac_id');
            $table->foreign('fk_pac_id')->references('pac_id')->on('pacientes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fallecidos');
    }
}

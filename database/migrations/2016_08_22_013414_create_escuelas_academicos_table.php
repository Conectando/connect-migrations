<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas_academicos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('detalle_escuela_id');
            $table->foreign('detalle_escuela_id')->references('id')->on('detalles_escuelas');
            $table->integer('academico_id');
            $table->foreign('academico_id')->references('id')->on('academicos');
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
        Schema::dropIfExists('escuelas_academicos');
    }
}

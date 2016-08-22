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
            $table->uuid('detalle_escuela_id');
            $table->foreign('detalle_escuela_id')->references('id')->on('detalles_escuelas');
            $table->string('rfc_academico', 13)->nullable();
            $table->foreign('rfc_academico')->references('rfc')->on('academicos');
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

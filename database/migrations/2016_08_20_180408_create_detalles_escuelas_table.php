<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_escuelas', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('escuela_id');
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->string('clave_ct');
            $table->string('rfc_director')->nullable();
            $table->foreign('rfc_director')->references('rfc')->on('academicos');
            $table->uuid('programa_id');
            $table->foreign('programa_id')->references('id')->on('programas_educativos');
            $table->enum('turno', [
                'CONTINUO (JORNADA AMPLIADA)', 
                'CONTINUO (TIEMPO COMPLETO)', 
                'DISCONTINUO',
                'MATUTINO',
                'NOCTURNO',
                'VESPERTINO'
            ]);
            $table->string('zona');
            $table->string('sotenimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_escuelas');
    }
}

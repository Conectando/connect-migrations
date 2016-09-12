<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosPlaneaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_planea', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('detalle_escuela_id')->unsigned()->unique();
            $table->integer('alumnos_programados_prueba')->unsigned()->default(0);
            $table->float('porcentaje_de_evaluados_lenguaje_y_comunicacion');
            $table->float('porcentaje_de_evaluados_matematicas');
            $table->boolean('la_prueba_es_representativa_leguaje_y_comunicacion');
            $table->boolean('la_prueba_es_representativa_matematicas');
            $table->boolean('informacion_poco_confiable_lenguaje_y_comunicacion');
            $table->boolean('informacion_poco_confiable_matematicas');
            $table->float('nivel_i_lenguaje_y_comunicacion');
            $table->float('nivel_ii_lenguaje_y_comunicacion');
            $table->float('nivel_iii_lenguaje_y_comunicacion');
            $table->float('nivel_iv_lenguaje_y_comunicacion');
            $table->enum('nivel_predominante_lenguaje_y_comunicacion', ['I', 'II', 'III', 'IV']);
            $table->float('nivel_i_matematicas');
            $table->float('nivel_ii_matematicas');
            $table->float('nivel_iii_matematicas');
            $table->float('nivel_iv_matematicas');
            $table->enum('nivel_predominante_matematicas', ['I', 'II', 'III', 'IV']);
            $table->timestamps();
            $table->foreign('detalle_escuela_id')->references('id')->on('detalles_escuelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados_planea');
    }
}

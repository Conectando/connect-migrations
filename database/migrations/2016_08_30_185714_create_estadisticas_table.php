<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('detalle_escuela_id')->unique();
            $table->foreign('detalle_escuela_id')->references('id')->on('detalles_escuelas');
            $table->integer("hombres_primero")->unsigned();
            $table->integer("mujeres_primero")->unsigned();
            $table->integer("total_primero")->unsigned();
            $table->integer("hombres_segundo")->unsigned();
            $table->integer("mujeres_segundo")->unsigned();
            $table->integer("total_segundo")->unsigned();
            $table->integer("hombres_tercero")->unsigned();
            $table->integer("mujeres_tercero")->unsigned();
            $table->integer("total_tercero")->unsigned();
            $table->integer("hombres_cuarto")->unsigned();
            $table->integer("mujeres_cuarto")->unsigned();
            $table->integer("total_cuarto")->unsigned();
            $table->integer("hombres_quinto")->unsigned();
            $table->integer("mujeres_quinto")->unsigned();
            $table->integer("total_quinto")->unsigned();
            $table->integer("hombres_sexto")->unsigned();
            $table->integer("mujeres_sexto")->unsigned();
            $table->integer("total_sexto")->unsigned();
            $table->integer("hombres_total")->unsigned();
            $table->integer("mujeres_total")->unsigned();
            $table->integer("matricula_total")->unsigned();
            $table->integer("docentes")->unsigned();
            $table->integer("grupos")->unsigned();
            $table->integer("docentes_educacion_fisica")->unsigned();
            $table->integer("docentes_actividades_artisticas")->unsigned();
            $table->integer("docentes_actividades_tecnonologicas")->unsigned();
            $table->integer("docentes_idiomas")->unsigned();
            $table->integer("personal_administrativo_servicios")->unsigned();
            $table->integer("director_con_grupo")->unsigned();
            $table->integer("director_sin_grupo")->unsigned();
            $table->integer("total_personal")->unsigned();
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
        Schema::dropIfExists('estadisticas');
    }
}

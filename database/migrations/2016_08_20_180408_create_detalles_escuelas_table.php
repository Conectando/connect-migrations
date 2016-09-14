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
            $table->engine = 'InnoDB';
            $table->increments('id');
            // clave de centro de trabajo
            $table->string('clave_ct', 15);
            $table->integer('escuela_id')->unsigned();
            $table->integer('nivel_id')->unsigned();
            // academico_id hace referencia al director
            $table->integer('academico_id')->unsigned()->nullable();
            $table->integer('programa_id')->unsigned();
            $table->enum('turno', [
                'JORNADA_AMPLIADA', 
                'TIEMPO_COMPLETO', 
                'DISCONTINUO',
                'MATUTINO',
                'NOCTURNO',
                'VESPERTINO'
            ]);
            $table->string('correo', 100)->nullable();
            $table->string('telefono')->nullable();
            $table->integer('zona');
            $table->integer('sector');
            // $table->integer('sostenimiento')->unsigned();
            $table->string('sotenimiento', 25);
            $table->timestamps();
        
            $table->foreign('escuela_id')->references('id')->on('escuelas');
            $table->foreign('nivel_id')->references('id')->on('niveles_educativos');
            $table->foreign('academico_id')->references('id')->on('academicos');
            $table->foreign('programa_id')->references('id')->on('programas_educativos');
            
        });
    }

    /**
     * Reverse the migratiozonans.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_escuelas');
    }
}

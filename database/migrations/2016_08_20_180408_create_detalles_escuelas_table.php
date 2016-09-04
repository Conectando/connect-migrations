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
            $table->integer('escuela_id');
            // clave de centro de trabajo
            $table->string('clave_ct', 15);
            $table->integer('nivel_id');
            // academico_id hace referencia al director
            $table->integer('academico_id')->nullable();
            
            $table->integer('programa_id');
            $table->enum('turno', [
                'CONTINUO (JORNADA AMPLIADA)', 
                'CONTINUO (TIEMPO COMPLETO)', 
                'DISCONTINUO',
                'MATUTINO',
                'NOCTURNO',
                'VESPERTINO'
            ]);
            $table->string('correo', 320)->nullable();
            $table->string('telefono')->nullable();
            $table->integer('zona');
            $table->integer('sector');
            $table->string('sotenimiento', 30);
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

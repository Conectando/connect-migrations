<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre_ct', 50);
            $table->string('direccion', 25);
            $table->string('colonia', 25);
            $table->string('calle_derecha', 25);
            $table->string('calle_izquierda', 25);
            $table->integer('codigo_postal')->unsigned();
            $table->integer('municipio_inegi_id')->unsigned();
            $table->integer('localidad_inegi_id')->unsigned();
            $table->string('estado', 25);
            $table->double('latitud');
            $table->double('longitud');
            $table->timestamps();
            $table->foreign('municipio_inegi_id')->references('id')->on('municipios_inegi');
            $table->foreign('localidad_inegi_id')->references('id')->on('localidades_inegi');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escuelas');
    }
}

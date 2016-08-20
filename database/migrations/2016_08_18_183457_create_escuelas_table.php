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
            $table->uuid('id');
            $table->primary('id');
            $table->string('nombre_ct');
            $table->uuid('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('niveles_educativos');
            $table->string('correo', 320);
            $table->string('telefono', 13);
            $table->string('direccion')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('localidad')->nullable();
            $table->string('estado')->nullable();
            $table->string('calle_derecha')->nullable();
            $table->string('calle_izquierda')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->double('latitud');
            $table->double('longitud');
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
        Schema::dropIfExists('escuelas');
    }
}

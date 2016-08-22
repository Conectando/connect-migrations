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
            $table->string('correo', 320);
            $table->string('telefono', 13);
            $table->string('direccion', 30)->nullable();
            $table->string('colonia', 30)->nullable();
            $table->string('municipio', 30)->nullable();
            $table->string('localidad', 30)->nullable();
            $table->string('estado', 30)->nullable();
            $table->string('calle_derecha', 30)->nullable();
            $table->string('calle_izquierda', 30)->nullable();
            $table->string('codigo_postal', 5)->nullable();
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

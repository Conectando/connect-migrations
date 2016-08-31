<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detalle_escuela_id')->unique();
            $table->foreign('detalle_escuela_id')->references('id')->on('detalles_escuelas');
            $table->double('desercion');
            $table->double('reprobacion');
            $table->double('reprobacion_regularizados');
            $table->double('eficiencia');
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
        Schema::dropIfExists('indicadores');
    }
}

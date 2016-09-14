<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('rfc', 13)->unique();
            $table->string('nombre', 50);
            $table->string('apaterno', 25)->nullable();
            $table->string('amaterno', 25)->nullable();
            $table->string('telefono', 13)->nullable(); // +XX XX XXXX XXXX
            $table->string('celular', 14)->nullable();  // +XX X XX XXXX XXXX
            $table->string('correo', 100)->nullable();
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
        Schema::dropIfExists('academicos');
    }
}

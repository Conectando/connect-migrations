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
            $table->string('rfc');
            $table->primary('rfc', 13);
            $table->string('nombre')->unique();
            $table->string('telefono', 13)->nullable(); // +XX XX XXXX XXXX
            $table->string('celular', 14)->nullable();  // +XX X XX XXXX XXXX
            $table->string('correo', 320)->nullable();
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

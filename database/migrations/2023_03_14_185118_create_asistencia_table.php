<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_alumno');
            $table->bigInteger('id_profesor');
            $table->bigInteger('id_materia');
            $table->dateTime('fecha_hora');
            $table->boolean('asistio');

            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->foreign('id_profesor')->references('id')->on('profesores');

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
        Schema::dropIfExists('asistencia');
    }
};

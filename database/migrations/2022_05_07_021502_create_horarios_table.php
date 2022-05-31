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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->references('id')->on('materias')->cascadeOnUpdate()->cascadeOnDelete()->comment('La materia a la que pertenece');
            $table->string('materia_nombre')->references('nombre')->on('materias')->cascadeOnUpdate()->cascadeOnDelete()->comment('Nombre de la materia a la que pertenece');
            $table->string('materia_color')->references('color')->on('materias')->cascadeOnUpdate()->cascadeOnDelete()->comment('Color de la materia a ls que pertenece');
            $table->string('dia_semana');
            $table->integer('hora_inicial');
            $table->integer('hora_final');
            $table->integer('duracion');
            $table->integer('user_id');
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
        Schema::dropIfExists('horarios');
    }
};

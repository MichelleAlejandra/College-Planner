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
        Schema::create('materias', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('creditos');
            $table->integer('horas');
            $table->integer('horas_dedicar_total');
            $table->integer('horas_total');
            $table->integer('horas_dedicar_semana');
            $table->integer('horas_pendientes');
            $table->integer('horas_pendientes_total');
            $table->integer('horas_total_clase');
            $table->integer('horas_ejecutadas');
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
        Schema::dropIfExists('materias');
    }
};

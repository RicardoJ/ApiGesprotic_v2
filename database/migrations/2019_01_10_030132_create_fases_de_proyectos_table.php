<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFasesDeProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fases_de_proyectos', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha_de_inicio');
            $table->date('fecha_fin');
            $table->string('nombre_de_hito');
            $table->string('nombre_de_fase');
            $table->date('entregable_principal');
            $table->date('fecha_hito');
            $table->integer('actaConstitucion_id')->unsigned();  
            $table->foreign('actaConstitucion_id')
            ->references('id')
            ->on('acta_constitucions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fases_de_proyectos');
    }
}

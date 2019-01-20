<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtrosRequisitosDeProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otros_requisitos_de_proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre') ;
            $table->string('cargo_departamento') ;

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
        Schema::dropIfExists('otros_requisitos_de_proyectos');
    }
}

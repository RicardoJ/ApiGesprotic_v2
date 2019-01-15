<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiesgosInicialesIdentificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riesgos_iniciales_identificados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre') ;
            $table->float('probabilidad') ;
            $table->string('impacta_sobre') ;
            $table->integer('valoracion') ;
            
            $table->foreign('actaConstitucion_id')
            ->references('id')
            ->on('actaConstitucions')
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
        Schema::dropIfExists('riesgos_iniciales_identificados');
    }
}

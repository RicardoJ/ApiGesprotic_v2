<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitacionesDePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limitaciones_de_partidas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('afecta_a');
            $table->integer('valoracion');
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
        Schema::dropIfExists('limitaciones_de_partidas');
    }
}

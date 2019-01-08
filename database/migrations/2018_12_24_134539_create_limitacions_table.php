<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable($value = false);
           $table->integer('lesson_learned_id')->unsigned();            
            $table->foreign('lesson_learned_id')
            ->references('id')
            ->on('lesson_learneds')
            ->onDelete('cascade');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('limitacions');
    }
}

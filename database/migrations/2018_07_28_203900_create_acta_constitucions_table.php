<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActaConstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acta_constitucions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente_peticionario') ;
            $table->string('responsable_de_cliente') ; 
            $table->date('fecha');
            $table->string('sponsor_nombre') ;
            $table->string('sponsor_departamento') ;
            $table->text('justificacion_del_proyecto') ;
            $table->text('descripcion_del_proyecto') ;
            $table->text('analisis_previo_de_viabilidad');
            $table->text('requisitos_generales_del_proyecto');
            $table->text('alcances_objetivos_del_proyecto');
            $table->text ('alcances_criterios_de_aceptacion');
            $table->text ('alcances_aprobacion_persona') ;
            $table->text ('alcances_aprobacion_departamento');
            $table->text ('tiempo_objetivos_del_proyecto');
        
            $table->text ('tiempo_criterios_de_aceptacion');
            $table->text ('tiempo_aprobacion_persona');
            $table->text('tiempo_aprobacion_departamento');
            $table->text('presupuesto_objetivos');
            $table->text('presupuesto_criterios_de_aceptacion');
            $table->text('presupuesto_aprobacion_persona');
            $table->text('presupuesto_aprovacion_departamento');
            $table->text('calidad_objetivos');
            $table->text('calidad_criterios_de_aceptacion');
            $table->text('calidad_aprobacion_persona');
            $table->text('calidad_aprobacion_departamento');
            $table->text('otros_aprobacion_departamento');
            $table->text('otros_objetivos');
            $table->text('otros_criterios_de_aceptacion');
            $table->text('otros_aprobacion_persona');
            $table->text('departamentos_implicados_y_recursos_preasignados');
            $table->text('factores_criticos_de_exito');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acta_constitucions');
    }
}

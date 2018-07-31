<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaPlanDirector extends Model
{
    protected $table = 'actaPlanDirector';
    public $timestamps = false;
    protected $fillable = ['nombre',
                            'director_del_proyecto',
                            'persona_revision', 
                            'persona_aprobacion',
                            'fases', 
                            'procesos',
                            'entradas', 
                            'salidas',
                            'interaccion', 
                            'gestion_cronograma_tiempo',
                            'umbral_varacion_tiempo', 
                            'seguimiento_tiempo',
                            'gestion_cronograma_coste',
                            'umbral_varacion_coste', 
                            'seguimiento_coste',
                            'gestion_cronograma_alcance',
                            'umbral_varacion_alcance', 
                            'seguimiento_alcance',
                            'gestion_cronograma_calidad',
                            'umbral_varacion_calidad', 
                            'seguimiento_calidad',
                            'descripcion_gestionAlcance',
                            'descripcion_gestionCronograma',
                            'descripcion_gestionCostes', 
                            'descripcion_gestionCalidad',
                            'descripcion_gestionRiesgos',
                            'descripcion_gestionComunicaciones',
                            'descripcion_gestionRecursos',
                            'descripcion_gestionRequisitos',
                            'descripcion_gestionAdquisiciones',
                            'descripcion_gestionConfiguracion',
                            'descripcion_gestionInteresados',
                            'descripcion_gestionControlCambio',
                            'descripcion_gestionMejoraProcesos',
                            'procesos_comunicacion_con_interesados',
                            'medidas_de_adaptacion_necesarias_en_los_procesos', 
                            'aspectos_claves_y_decisiones_pendientes',
                            'proceso_de_revision_del_planDelDirector', 
                            'documento_adjuntos',
                            'descripcion_documento', 
                            ];
}

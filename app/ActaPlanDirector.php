<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaPlanDirector extends Model
{
    protected $table = 'actaPlanDirector';
    public $timestamps = false;
    protected $fillable = [

        'revision_persona1',
        'revision_firma',
        'aprobacion_persona2',
        'aprobacion_firma',
        
        'ciclo_vida_fases',
        'ciclo_vida_procesos',
        'ciclo_vida_entradas',
        'ciclo_vida_salidas',
        'ciclo_vida_interacion',
        'ciclo_vida_cerrarFase',
        
        'gestion_cronograma',
        'umbral_cronograma_variacion',
        'cronograma_seguimiento_y_control',
        
        'gestion_coste',
        'umbral_coste_variacion',
        'coste_seguimiento_y_control',
        
        'gestion_alcance',
        'umbral_alcance_variacion',
        'alcance_seguimiento_y_control',
        
        'gestion_calidad',
        'umbral_calidad_variacion',
        'calidad_seguimiento_y_control',
        
        'persona_gestionAlcance',
        'persona_gestionCronograma',
        'persona_gestionCostes',
        'persona_gestionCalidad',
        'persona_gestionRiesgos',
        'persona_gestionComunicaciones',
        'persona_gestionRecursos',
        'persona_gestionRequisitos',
        'persona_gestionAdquisiciones',
        'persona_gestionConfiguracion',
        'persona_gestionInteresados',
        'persona_gestionControlCambio',
        'persona_mejoraProcesos',
        
        'proceso_de_comunicacion_stakeholders',
        'medidas_adaptacion',
        'aspectos_claves',
        'procesos_revision',
        'documento'=> 'required',
        'resumen_documento',
                            'project_id'
                            ];
                            
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}

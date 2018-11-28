<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamManagement extends Model
{

    protected $table = 'teamManagement';
    public $timestamps = false;
    protected $fillable = [
        'miembroDelEquipo_persona',
'miembroDelEquipo_rol',
'periodo_desde',
'periodo_hasta',
'fecha_de_estado',

'objetivo_alcance_indicadores',
'comentarios_alcance',
'check_superadas_alcance',
'check_alcanzadas_alcance',
'check_mejora_alcance',

'objetivo_calidad_indicadores',
'comentarios_calidad',
'check_superadas_calidad',
'check_alcanzadas_calidad',
'check_mejora_calidad',

'objetivo_planificacion_indicadores',
'comentarios_planificacion',
'check_superadas_planificacion',
'check_alcanzadas_planificacion',
'check_mejora_planificacion',

'objetivo_presupuesto_indicadores',
'comentarios_presupuesto',
'check_superadas_presupuesto',
'check_alcanzadas_presupuesto',
'check_mejora_presupuesto',

'objetivo_interpersonales_indicadores',
'comentarios_interpersonales',
'check_superadas_interpersonales',
'check_alcanzadas_interpersonales',
'check_mejora_interpersonales',

'comunicacion_indicadores',
'comentarios_comunicacion',
'check_superadas_comunicacion',
'check_alcanzadas_comunicacion',
'check_mejora_comunicacion',

'trabajoEquipo_indicadores',
'comentarios_trabajoEquipo',
'check_superadas_trabajoEquipo',
'check_alcanzadas_trabajoEquipo',
'check_mejora_trabajoEquipo',

'tomaDesiciones_indicadores',
'comentarios_tomaDesiciones',
'check_superadas_tomaDesiciones',
'check_alcanzadas_tomaDesiciones',
'check_mejora_tomaDesiciones',

'gestionConflictos_indicadores',
'comentarios_gestionConflictos',
'check_superadas_gestionConflictos',
'check_alcanzadas_gestionConflictos',
'check_mejora_gestionConflictos',

'asertividad_indicadores',
'comentarios_asertividad',
'check_superadas_asertividad',
'check_alcanzadas_asertividad',
'check_mejora_asertividad',


'vision_estrategica',
'fortalezas_personales',
'area_mejoras',
'accion_desarrollo',
'plazo',

'justificacion_proyecto',

'comentarios_adicionales',
        'project_id'];

    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }
   
}

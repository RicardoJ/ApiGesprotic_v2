<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ActaRiesgo extends Model
{
    protected $table = 'actaRiesgo';
    public $timestamps = false;
    protected $fillable = [
    'edicion_previa',
    'edicion_revisada',
    
    'fecha_edicion_previa',
   /* 'fecha_revision',
    'descripcion_del_proceso',
    'herramientas_tecnicas_identificacion',
    'tarea_trabajo_actividad',
    'responsable',
    
    'stakeholder',
    'tiempo',
    'calidad',
    'coste',
    'otro',
    'tipo_riesgo',
    'descripcion_causas_fuentes',
    
    'descripcion_casiCierto',
    'descripcion_probable',
    'descripcion_posible',
    'descripcion_pocoProbable',
    'descripcion_raro',
    
    
    'matriz_riesgo_00',
    'matriz_riesgo_01',
    'matriz_riesgo_02',
    'matriz_riesgo_03',
    'matriz_riesgo_04',
    'matriz_riesgo_05',
    
    'matriz_riesgo_10',
    'matriz_riesgo_11',
    'matriz_riesgo_12',
    'matriz_riesgo_13',
    'matriz_riesgo_14',
    'matriz_riesgo_15',
    
    'matriz_riesgo_20',
    'matriz_riesgo_21',
    'matriz_riesgo_22',
    'matriz_riesgo_23',
    'matriz_riesgo_24',
    'matriz_riesgo_25',
    
    'matriz_riesgo_30',
    'matriz_riesgo_31',
    'matriz_riesgo_32',
    'matriz_riesgo_33',
    'matriz_riesgo_34',
    'matriz_riesgo_35',
    
    'matriz_riesgo_40',
    'matriz_riesgo_41',
    'matriz_riesgo_42',
    'matriz_riesgo_43',
    'matriz_riesgo_44',
    'matriz_riesgo_45',
    
    
    'matriz_riesgo_50',
    'matriz_riesgo_51',
    'matriz_riesgo_52',
    'matriz_riesgo_53',
    'matriz_riesgo_54',
    'matriz_riesgo_55',
    
    
    'presupuesto_gestion_riesgo',
    'protocolo_contigencia',
    'protocolo_control_riesgo',
    'protocolo_comunicacion_riesgos',
    'protocolo_auditoria_planRiesgo',*/
                            'project_id'
                            
                            ];
                            
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
                            
}
<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ActaConstitucion extends Model
{
    protected $table = 'actaConstitucion';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
        'CLIENTE_PETICIONARIO' ,
        'persona_Rpble_Cliente', 
    /*    'departamento_cliente' ,
        'sponsor' =,
        'persona_sponsor' ,
        'departamento_sponsor' ,
        'director',
        'persona_director',
        'departamaneto_director',
        'codigo_proyecto',
        'check_pendienteAsignacion' ,
        'check_contrato',
        'check_casoNegocio',
        
        'check_Enunciado',
        'vision_estrategica',
        'descripcion_del_proyecto',
        'analisis_previo_viabilidad',
        'requisitos_generales',
        'alcance_objetivos',
        'alcance_metrica',
        'alcance_aprobacion_persona',
        'alcance_aprobacion_departamento',
        'tiempo_objetivos',
        'tiempo_metrica',
        'tiempo_aprobacion_persona',
        'tiempo_aprobacion_departamento',
        'presupuesto_objetivos',
        'presupuesto_metrica',
        'presupuesto_aprobacion_persona',
        'presupuesto_aprobacion_departamento',
        'calidad_objetivos',
        
      '  calidad_metrica',
        'calidad_aprobacion_persona',
        'calidad_aprobacion_departamento',
        
        'otros_objetivos',
        'otros_metrica',
        'otros_aprobacion_persona',
       ' otros_aprobacion_departamento',
        
        'fase',
        'hito_fase',
        'duracion_fase',
        
        'hito',
        'entregable',
        'fecha_hito',
        
        'otrosRequisitos_nombre',
        'otrosRequisitos_cargo',
        
        'limitacion',
        'afecta_a',
       ' valoracion',
        
        'riesgo',
        'probabilidad',
        'impacta_sobre',
        'valoracion_riesgo',
        
        'departamentos_implicados',
        'factores_criticos_de_exito',
        'observaciones_adicionales',
        'vision_estrategica',
        
        'maxima_desviacion',
        'umbral_de_riesgo',
       ' capacidad_tecnica',
       ' volumen_contratacion',
        'nivel_superior_desicion_persona'=> ,
        'nivel_superior_desicion_departamento',
        
        'firma_director',*/
                            'project_id'
                            ];
                            
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}
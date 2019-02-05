<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ActaConstitucion extends Model
{
    protected $table = 'acta_constitucions';
    public $timestamps = false;
    protected $fillable = [
        'fecha' ,
        'sponsor_nombre' ,
        'sponsor_departamento' ,
        'justificacion_del_proyecto' ,
        'descripcion_del_proyecto' ,
        'analisis_previo_de_viabilidad',
        'requisitos_generales_del_proyecto',
        'alcances_objetivos_del_proyecto',
        'alcances_criterios_de_aceptacion',
        'alcances_aprobacion_persona' ,
        'alcances_aprobacion_departamento',
        'tiempo_objetivos_del_proyecto',
        
        'tiempo_criterios_de_aceptacion',
        'tiempo_aprobacion_persona',
        'tiempo_aprobacion_departamento',
        'presupuesto_objetivos',
        'presupuesto_criterios_de_aceptacion',
        'presupuesto_aprobacion_persona',
        'presupuesto_aprobacion_departamento',
        'calidad_objetivos',
        'calidad_criterios_de_aceptacion',
        'calidad_aprobacion_persona',
        'calidad_aprobacion_departamento',
        'otros_aprobacion_departamento',
        'otros_objetivos',
        'otros_criterios_de_aceptacion',
        'otros_aprobacion_persona',
        'departamentos_implicados_y_recursos_preasignados',
        'factores_criticos_de_exito',

        'cliente_peticionario_nombre' ,
        'cliente_representante_legal_departamento', 
        'cliente_representante_legal_nombre',
        'documentacion_adjunta_enunciado_trabajo', 
        'documentacion_adjunta_caso_negocio',
        'documentacion_adjunta_contrato',
        'observaciones_adicionales',
        'maxima_desviacion',
        'umbral_de_riesgo', 
        'capacidad_tecnica', 
        'volumen_de_contratacion', 
        'nivel_superior_decision_persona', 
        'nivel_superior_decision_departamento', 
        'firma',
        
        'limitaciones_de_partida',
        'fases_de_proyectos',
        'riesgos_iniciales_identificados',
        'otros_requisitos_de_proyecto',
                            'project_id'
                            ];
                            
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
    public function limitaciones_de_partida(){
        return $this->hasMany('App\LimitacionesDePartida');
    }

    public function fases_de_proyectos(){
        return $this->hasMany('App\FasesDeProyectos');
    }

    public function RiesgosInicialesIdentificados(){
        return $this->hasMany('App\Riesgos_iniciales_identificados');
    }
    public function OtrosRequisitos(){
        return $this->hasMany('App\Otros_requisitos_de_proyecto');
    }
}
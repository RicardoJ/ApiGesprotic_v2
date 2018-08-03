<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaConstitucion extends Model
{
    protected $table = 'actaConstitucion';
    public $timestamps = false;
    protected $fillable = ['nombre',
                            'fecha',
                            'cliente', 
                            'cliente',
                            'codigo_identificacion',
                            'pendiente_asignacion',
                            'contrato',
                            'caso_de_negocio',
                            'enunciado_trabajo',
                            'vision_estrategica',
                            'descripcion_del_proyecto',
                            'analisis_de_viabilidad',
                            'requisitos_generales',
                            'objetivos_alcance',
                            'metrica_alcance',
                            'aprobacion_persona_alcance',
                            'obejtivos_plazo',
                            'metrica_plazo',
                            'aprobacion_persona_plazo',
                            'obejtivos_presupuesto',
                            'metrica_presupuesto',
                            'aprobacion_persona_presupuesto',
                            'obejtivos_calidad',
                            'metrica_calidad',
                            'aprobacion_persona_calidad',
                            'obejtivos_otros',
                            'metrica_otros',
                            'aprobacion_persona_otros',
                            'fase',
                            'hitoFase',
                            'duracion',
                            'hito',
                            'entregable',
                            'fecha',
                            'nombre_principalesImplicados',
                            'cargo',
                            'limitacion',
                            'afecta_a',
                            'valoracionLimitacion',
                            'riesgo',
                            'probabilidad',
                            'impacta_sobre',
                            'valoracionRiesgo',
                            'departamentos_implicados',
                            'normativa_aplicable',
                            'factores_criticos_de_exito',
                            'observaciones',
                            'maxima_desviacion_sobre_presupuesto',
                            'umbral_de_riesgo_aceptable',
                            'capacidad_tecnica_de_desicion',
                            'volumen_de_contratacion',
                            'persona_nivel_superior_de_desicion',
                            'project_id'
                            ];
                            
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}

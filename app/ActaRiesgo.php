<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaRiesgo extends Model
{
    protected $table = 'actaRiesgo';
    public $timestamps = false;
    protected $fillable = ['nombre',
                            'director',
                            'version',
                            'edicion_revisada',
                            'fecha_edicion_revisada',
                            'fecha_revision',
                            'descripcion_proceso_de_gestion',
                            'heramientas_de_identificacion_y_estimacion',
                            'tarea',
                            'responsable',
                            'stakeholder',
                            'tiempo',
                            'calidad',
                            'coste',
                            'otro',
                            'tipo_de_riesgo',
                            'causas',
                            'nivel_probabilidad',
                            'descripcion_probabilidad',
                            'presupuesto_gestion_riesgos',
                            'protocolo_contigencia',
                            'protocolo_de_control_riesgos',
                            'protocolo_de_conmunicacion_riesgos',
                            'protocolo_de_auditoria_riesgos',
                            
                            ];
}

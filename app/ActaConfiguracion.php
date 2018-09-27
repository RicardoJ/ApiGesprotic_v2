<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaConfiguracion extends Model
{
    protected $table = 'actaConfiguracion';
    public $timestamps = false;
    protected $fillable = ['nombre',
                            'director',
                            'aprobacion_persona',
                            'nombre_del_rol',
                            'persona_asignada',
                            'responsabilidades',
                            'niveles_de_autoridades',
                            'documentos',
                            'formato',
                            'acceso_rapido_necesario',
                            'disponibilidad_amplia_necesaria',
                            'seguridad_acceso',
                            'recuperacion_informacion',
                            'retencion_informacion',
                            'codigo_del_item_de_configuración',
                            'nombre_item_de_configuracion',
                            'categoria',
                            'fuente',
                            'formato',
                            'gestion_del_cambio',
                            'contabilidad_de_estado_y_metricas',
                            'verificacion_y_auditorias',
                            'objetivos_y_alcance_del_plan',
                            'rol',
                            'funciones_y_responsabilidades',
                            'entregables',
                            'normas_de_identificacionEntregable',
                            'responsableEntregable',
                            'documento',
                            'normas_de_identificacionDocumento',
                            'responsableDocumento',
                            'procedimiento_para_control_de_cambio',
                            'plan_de_gestion_de_cambio',
                            'codigo_documento',
                            'fecha_aprobacion',
                            'responsable',
                            'comunicacion_de_cambios_a_interesados',
                            'procedimiento_y_niveles_de_aprobacion',
                            'procedimiento_de_auditoria_en_la_gestion_de_la_configuracion',
                            'documento_adjunto',
                            'descripcion', 
                            'project_id'
                            ];


    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}

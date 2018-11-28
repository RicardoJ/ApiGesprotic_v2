<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaConfiguracion1 extends Model
{
    protected $table = 'actaConfiguracion1';
    public $timestamps = false;
    protected $fillable = [
    'aprobacion_persona',
    'aprobacion_firma',
    
    'nombre_rol',
    'persona_asignada',
    'responsabilidades',
    'nivel_autoridad',
    
    'documentos',
    'formato',
    'acceso_rapido',
    'disponibilidad_amplia',
    'seguridad_acceso',
    'recuperacion_informacion',
    'retencion_informacion',
    'codigo_item',
    'nombre_item',
    'categoria',
    'fuente',
    'formato_software1',
    'formato_software2',
    'gestion_del_cambio',
    'contabilidad_de_estado',
    'verificacion_y_auditoria',
                            'project_id'
                            ];


    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}

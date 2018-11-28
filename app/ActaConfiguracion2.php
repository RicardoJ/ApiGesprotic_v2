<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActaConfiguracion2 extends Model
{
    protected $table = 'actaConfiguracion2';
    public $timestamps = false;
    protected $fillable = [
'objetivos_y_alcance',
'rol_a_desempeñar',
'funciones_y_responsabilidades',

'elemento_entregables',
'normas_identificacion_elementos',
'responsable_elementos',

'documento',
'norma_identificacion_documento',
'responsable_documento',

'sistema_procedimiento',
'codigo_documento',
'fecha_aprobacion',
'procedimiento_comunicacion',
'procedimiento_y_niveles_de_aprobacion',
'procedimiento_de_auditoria_en_la_gestion',
'documento_lineaBase',
'descripcion_resumen',
        'project_id'];

    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }
}

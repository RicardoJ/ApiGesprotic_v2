<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ActaConstitucion extends Model
{
    protected $table = 'acta_constitucions';
    public $timestamps = false;
    protected $fillable = [
        'cliente_peticionario' ,
        'responsable_de_cliente' , 
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
        'presupuesto_aprovacion_departamento',
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
                            'project_id'
                            ];
                            
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
    public function limitaciones_de_partida(){
        return $this->hasOne('App\Limitaciones_de_partida');
    }
}
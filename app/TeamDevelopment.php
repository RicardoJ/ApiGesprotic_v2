<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class TeamDevelopment extends Model
{
    protected $table = 'teamDevelopment';
    public $timestamps = false;
    protected $fillable = [
        'miembro_equipo_persona',
        'miembro_equipo_rol',
        'desde',
        'hasta',
     /*   'fecha_estado',
        'informe_id',
        'actividades_planificadas',
        'check_realizada',
        'check_noRealizada',
        'id_actividad_no_realizada',
        'actividad_no_realizada',
        'causa_actividad_no_realizada',
        'id_actividad_no_planificada',
        'actividad_mo_planificada',
        'causa_actividad_no_planificada',
        'fondos_planificados',
        'fondos_consumidos',
        'fondos_causa_desviacion',
        'nivel_cumplidos',
        'nivel_NoCumplidos',
        'nivel_causas_desviacion',
        'id_acciones_preventinas',
        'acciones_preventinas_a_realizar',
        'periodo_desde',
        'periodo_hasta',
        'proxima_fecha_revision',
        'id_acciones_planificadas',
        'acciones_planificadas',
        'fondos_y_presupuesto',
        'nuevos_riesgos',
        'problemas_y_dificultades',
        'otros_comentarios',*/
        'project_team_id'];
        public function project_team(){
            return $this->BelongsTo('App\Project_team', 'project_team_id');
            
        }
}
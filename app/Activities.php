<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activities';
    public $timestamps = false;
    protected $fillable = [
        'fecha'
        'codigo_Actividad',
        'actividad',
        'descripcion_trabajo',
       ' actividad_predecesora',
        'relaciones_logicas_predecesora',
        'adelantos_o_atrasos_predecesora',
        'actividad_sucesora',
        'relaciones_logicas_sucesora',
        'adelantos_o_atraso_sucesora',
        'nombre_recurso_requierido',
       ' habilidades',
        'otros_recursos_requerido',
        'nivel_esfuerzo',
        'supuesto',
        'project_team_id'];

    public function project_team(){
        return $this->BelongsTo('App\Project_team', 'project_team_id');
        
    }

    
}

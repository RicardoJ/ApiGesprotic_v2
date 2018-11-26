<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';
    public $timestamps = false;
    protected $fillable = ['nombre',
    'apellidos',
    'rol',
    'email',
    'departamento',
    'lugar_de_trabajo',
    'horario',
    'tlf',
    'project_team_id'];

    public function project_team(){
        return $this->BelongsTo('App\Project_team', 'project_team_id');
        
    }
}

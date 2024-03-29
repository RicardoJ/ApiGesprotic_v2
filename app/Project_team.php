<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_team extends Model
{
    protected $table = 'project_team';
    public $timestamps = false;
    protected $fillable = [
        'nombre_equipo',
            'fecha',
            'rol' ,
            'responsabilidad' ,
            'ambito' ,
            'competencias' ,
            'image' ,
 'project_id'];
    
    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }

    public function people(){
        return $this->hasMany('App\People');
    }

    
    public function activities(){
        return $this->hasMany('App\Activities');
    }

    public function teamDevelopment(){
        return $this->hasMany('App\TeamDevelopment');
    }
    public function teamManagement(){
        return $this->hasOne('App\TeamManagement');
    }
}

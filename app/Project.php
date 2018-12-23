<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    public $timestamps = false;
    protected $fillable = ['director','nombre','departamento'];
    
    public function actaconfiguracion1(){
        return $this->hasOne('App\ActaConfiguracion1');
    }
    public function actaconfiguracion2(){
        return $this->hasOne('App\ActaConfiguracion2');
    }
    public function actariesgo(){
        return $this->hasOne('App\ActaRiesgo');
    }
    public function actaconstitucion(){
        return $this->hasOne('App\ActaConstitucion');
    }
    public function planDirector(){
        return $this->hasOne('App\ActaPlanDirector');
    }
    public function change(){
        return $this->hasMany('App\Change');
    }

    public function lessonLearned(){
        return $this->hasOne('App\LessonLearned');
    }

    public function project_team(){
        return $this->hasMany('App\Project_team');
    }

    public function resource(){
        return $this->hasMany('App\Resource');
    }
    public function acquisition(){
        return  $this->belongsToMany('App\Acquisition');
    }
    public function planProject(){
        return $this->hasOne('App\PlanProject');
    }

    public function projectOrganization(){
        return $this->hasOne('App\ProjectOrganization');
    }
    
    
}

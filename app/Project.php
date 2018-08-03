<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    public $timestamps = false;
    protected $fillable = ['director','nombre','plan'];
    
    public function actaconfiguracion(){
        return hasOne('App\ActaConfiguracion');
    }
    public function actariesgo(){
        return hasOne('App\ActaRiesgo');
    }
    public function actaconstitucion(){
        return hasOne('App\ActaConstitucion');
    }
    public function planDirector(){
        return hasOne('App\ActaPlanDirector');
    }
    public function change(){
        return hasMany('App\Change');
    }

    public function lessonLearned(){
        return hasOne('App\LessonLearned');
    }

    public function project_team(){
        return hasOne('App\Project_team');
    }

    public function resource(){
        return hasMany('App\Resource');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    public $timestamps = false;
    protected $fillable = ['director','nombre','plan'];
    
    public function acta(){
        return hasOne('App\Acta');
    }
    public function riesgo(){
        return hasOne('App\Acta');
    }
    public function configuracion(){
        return hasOne('App\Acta');
    }
    public function cambio(){
        return hasOne('App\Acta');
    }
}

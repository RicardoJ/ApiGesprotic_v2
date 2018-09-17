<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'provider';
    public $timestamps = false;
    protected $fillable = ['empresa','contacto','telefono','direccion','email','provider_id','project_id'];

    public function acquisition(){
        return hasMany('App\Acquisition');
    }

    public function agreement(){
        return hasOne('App\Agreement');
    }
}

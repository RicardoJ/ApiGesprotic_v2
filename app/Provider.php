<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'provider';
    public $timestamps = false;
    protected $fillable = ['empresa',
    'contacto','telefono','direccion',
    'email'];

    public function acquisition(){
        return $this->hasMany('App\Acquisition');
    }

    public function agreement(){
        return $this->hasOne('App\Agreement');
    }
}

<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Provider extends Model
{
    protected $table = 'provider';
    public $timestamps = false;
    protected $fillable = [
            'nombre', 
            'nombre_empresa',
            'telefono' ,
            'direccion',
            'tipo_de_servicio',
            'nit_o_cc',
            'email'
    ];
/*
    public function acquisition(){
        return $this->hasMany('App\Acquisition');
    }
*/
    public function agreement(){
        return $this->hasOne('App\Agreement');
    }
    public function resource(){
        return $this->hasMany('App\Resource');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otros_requisitos_de_proyecto extends Model
{
    protected $table = 'otros_requisitos_de_proyectos';
    public $timestamps = false;
    protected $fillable = [
            'nombre', 
            'cargo_departamento',
            'actaConstitucion_id'
           
           
    ];

    public function actaConstitucion(){
        return $this->BelongsTo('App\actaConstitucion', 'actaConstitucion_id');
        
    }
}

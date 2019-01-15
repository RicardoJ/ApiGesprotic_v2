<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riesgos_iniciales_identificados extends Model
{
    protected $table = 'riesgos_iniciales_identificados';
    public $timestamps = false;
    protected $fillable = [
            'nombre', 
            'probabilidad',
            'impacta_sobre',
            'valoracion'
           
    ];

    public function actaConstitucion(){
        return $this->BelongsTo('App\actaConstitucion', 'actaConstitucion_id');
        
    }
}

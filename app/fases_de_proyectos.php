<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fases_de_proyectos extends Model
{
    protected $table = 'fases_de_proyectos';
    public $timestamps = false;
    protected $fillable = [
        'fecha_de_inicio',
        'fecha_fin',
        'nombre_de_hito',
        'nombre_de_fase',
        'entregable_principal',
        'fecha_hito',
        'actaConstitucion_id'
            
           
    ];

    public function actaConstitucion(){
        return $this->BelongsTo('App\actaConstitucion', 'actaConstitucion_id');
        
    }
}

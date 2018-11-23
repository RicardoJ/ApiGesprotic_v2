<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    protected $table = 'acquisition';
    public $timestamps = false;
    protected $fillable = [

        'fecha',
        'edicion',
        'nombre_persona_responsable',
        'alcance',
        'prescripciones',
        'cantidad',
        'documentacion',
        'documentacion_a_entregar',
        'precio',
        'plazo_final' ,
        'informacion_a_incluir',
        'criterio',
        'otra_informacion'


   ];

    /*
    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }

    public function provider(){
        return $this->BelongsTo('App\Provider', 'provider_id');
        
    }
    */
}

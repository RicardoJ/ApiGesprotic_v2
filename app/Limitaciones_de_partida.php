<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limitaciones_de_partida extends Model
{
    protected $table = 'limitaciones_de_partida';
    public $timestamps = false;
    protected $fillable = [
            'nombre', 
            'afecta_a',
            'valoracion'
           
    ];

    public function actaConstitucion(){
        return $this->BelongsTo('App\actaConstitucion', 'actaConstitucion_id');
        
    }
}

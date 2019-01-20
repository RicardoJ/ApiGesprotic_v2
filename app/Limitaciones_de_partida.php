<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limitaciones_de_partida extends Model
{
    protected $table = 'limitaciones_de_partidas';
    public $timestamps = false;
    protected $fillable = [
            'nombre', 
            'afecta_a',
            'valoracion',
            'actaConstitucion_id'
           
    ];

    public function actaConstitucion(){
        return $this->BelongsTo('App\ActaConstitucion', 'actaConstitucion_id');
        
    }
}

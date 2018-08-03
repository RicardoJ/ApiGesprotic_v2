<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    protected $table = 'change';
    public $timestamps = false;
    protected $fillable = ['cambioPropuestoPor','descripcion','nombre','responsable','estado','acta_id','project_id'];
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}

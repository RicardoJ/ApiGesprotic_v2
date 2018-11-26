<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resource';
    public $timestamps = false;
    protected $fillable = [
        'wbs',
        'tipo_recurso',
        'cantidad',
        'comentarios',
        'vision_estrategica',
        'project_id','provider_id'];

    
    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }
    public function provider(){
        return $this->BelongsTo('App\Provider', 'provider_id');
        
    }
    
}

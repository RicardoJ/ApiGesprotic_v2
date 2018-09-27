<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resource';
    public $timestamps = false;
    protected $fillable = ['descripcion','fecha_Inicial','fecha_Final','nombre','origen','relevancia','tipo','unidades','project_id'];

    
    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }

    
}

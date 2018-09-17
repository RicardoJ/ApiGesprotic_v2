<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    protected $table = 'acquisition';
    public $timestamps = false;
    protected $fillable = ['descripcion','fecha_Inicial','fecha_Final','nombre','origen','relevancia','tipo','unidades','project_id','provider_id'];

    
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }

    public function provider(){
        return $this->BelongsTo('App\Provider', 'provider_id');
        
    }
}
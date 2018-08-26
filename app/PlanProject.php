<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanProject extends Model
{
    protected $table = 'planProject';
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion','completed','project_id'];

    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activities';
    public $timestamps = false;
    protected $fillable = ['nombre','porcentaje','completed','project_team_id'];

    public function project_team(){
        return $this->BelongsTo('App\Project_team', 'project_team_id');
        
    }

    
}

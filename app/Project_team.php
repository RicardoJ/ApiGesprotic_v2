<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_team extends Model
{
    protected $table = 'project_team';
    public $timestamps = false;
    protected $fillable = ['nombre','image','project_id'];
    
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }

    public function people(){
        return hasMany('App\People');
    }

    
    public function activities(){
        return hasMany('App\Activities');
    }
}

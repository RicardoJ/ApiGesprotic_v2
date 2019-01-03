<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonLearned extends Model
{
    protected $table = 'lesson_learneds';
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion','project_id'];
    
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
    public function limitacion(){
        return $this->hasMany('App\limitacion');
    }
    
}

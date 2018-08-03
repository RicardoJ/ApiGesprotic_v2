<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonLearned extends Model
{
    protected $table = 'lessonlearned';
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion','objetivo','informe','project_id'];
    
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
    
}

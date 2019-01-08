<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fase extends Model
{
    protected $table = 'fases';
    public $timestamps = false;
    protected $fillable = ['fase','lesson_learned_id'];
    
    public function lessonLearned(){
        return $this->BelongsTo('App\LessonLearned', 'lesson_learned_id');
        
    
}
}

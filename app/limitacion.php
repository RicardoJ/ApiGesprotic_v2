<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class limitacion extends Model
{
    protected $table = 'limitacions';
    public $timestamps = false;
    protected $fillable = ['nombre','lesson_learned_id'];
    
    public function lessonLearned(){
        return $this->BelongsTo('App\LessonLearned', 'lesson_learned_id');
        
    
}
}
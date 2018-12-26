<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    public $timestamps = false;
    protected $fillable = ['director'];
    
   
    public function lessonLearned(){
        return $this->hasOne('App\LessonLearned');
    }

}

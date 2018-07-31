<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonLearned extends Model
{
    protected $table = 'lessonlearned';
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion','objetivo','informe','project_id'];
    
}

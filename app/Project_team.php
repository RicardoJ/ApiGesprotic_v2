<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_team extends Model
{
    protected $table = 'project_team';
    public $timestamps = false;
    protected $fillable = ['nombre','project_id'];
}

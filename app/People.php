<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';
    public $timestamps = false;
    protected $fillable = ['nombre','apellidos','rol','email','competencias','project_team_id'];
}

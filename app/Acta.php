<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    protected $table = 'acta';
    public $timestamps = false;
    protected $fillable = ['nombre','fecha','tipo', 'cantidad'];

}

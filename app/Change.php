<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    protected $table = 'change';
    public $timestamps = false;
    protected $fillable = [
        'fecha',
'director_persona',
'director_departamento',
'propuesta_persona',
'propuesta_departamento',

'check_alcance',
'check_costo',
'check_plazo',
'check_otro',

'descripcion_alcance',
'descripcion_costo',
'descripcion_plazo',
'descripcion_otro',

'check_relacionValorada',
'check_plano',
'check_otro',
'documentacion_adjunta',

'check_aprueba',
'check_aplaza',
'check_rechaza',
'cliente',

'nombre_persona_notificada',
'rol',
'firma',
'fecha',
        
        'project_id'];
    public function project(){
        return $this->BelongsTo('App\project', 'project_id');
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectOrganization extends Model
{
    protected $table = 'projectOrganization';
    public $timestamps = false;
    protected $fillable = [
        'cliente_persona',
        'cliente_departamento',
        
        'principios',
        'directrices_comunicacion',
        'directrices_reunion',
        'proceso_desiciones',
        'directrices_conflictos',
        'compromisos',
        'otros_acuerdos',
        
        'aceptacion_acuerdo_persona',
        'aceptacion_Acuerdo_firma',
        'project_id'];

    public function project(){
        return $this->BelongsTo('App\Project', 'project_id');
        
    }
}

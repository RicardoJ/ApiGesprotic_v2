<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreement';
    public $timestamps = false;
    protected $fillable = [

        'lugar',
        'nit' , 
        'fecha', 
        'lugar_domicilio',
        'monto', 
        'domicilio_proveedor',
        'tipo_adquisicion',
        'tiempo_contrato',
        'nombre_Empresa',
        'nombre_proveedor',
        'provider_id'];

    public function provider(){
        return $this->BelongsTo('App\Provider', 'provider_id');
        
    }
}

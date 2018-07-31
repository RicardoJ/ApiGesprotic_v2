<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreement';
    public $timestamps = false;
    protected $fillable = ['contenido','fecha_Entrega','fecha_Contrato','metodo_Pago','nombre_Empresa','persona_Encargada','provider_id'];
}

<?php

namespace App\Http\Controllers;

use App\ActaConfiguracion;
use Illuminate\Http\Request;

class ActaConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ActaConfiguracion::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                            'nombre'=> 'required',
                            'director'=> 'required',
                            'aprobacion_persona'=> 'required',
                            'nombre_del_rol'=> 'required',
                            'persona_asignada'=> 'required',
                            'responsabilidades'=> 'required',
                            'niveles_de_autoridades'=> 'required',
                            'documentos'=> 'required',
                            'formato'=> 'required',
                            'acceso_rapido_necesario'=> 'required',
                            'disponibilidad_amplia_necesaria'=> 'required',
                            'seguridad_acceso'=> 'required',
                            'recuperacion_informacion'=> 'required',
                            'retencion_informacion'=> 'required',
                            'codigo_del_item de_configuración'=> 'required',
                            'nombre_item_de_configuracion'=> 'required',
                            'categoria'=> 'required',
                            'fuente'=> 'required',
                            'formato'=> 'required',
                            'gestion_del_cambio'=> 'required',
                            'contabilidad_de_estado_y_metricas'=> 'required',
                            'verificacion_y_auditorias'=> 'required',
                            'objetivos_y_alcance_del_plan'=> 'required',
                            'rol'=> 'required',
                            'funciones_y_responsabilidades'=> 'required',
                            'entregables'=> 'required',
                            'normas_de_identificacionEntregable'=> 'required',
                            'responsableEntregable'=> 'required',
                            'documento'=> 'required',
                            'normas_de_identificacionDocumento'=> 'required',
                            'responsableDocumento'=> 'required',
                            'procedimiento_para_control_de_cambio'=> 'required',
                            'plan_de_gestion_de_cambio'=> 'required',
                            'codigo_documento'=> 'required',
                            'fecha_aprobacion'=> 'required',
                            'responsable'=> 'required',
                            'comunicacion_de_cambios_a_interesados'=> 'required',
                            'procedimiento_y_niveles_de_aprobacion'=> 'required',
                            'procedimiento_de_auditoria_en_la_gestion_de_la_configuracion'=> 'required',
                            'documento_adjunto'=> 'required',
                            'descripcion'=> 'required',
                                                            ]);
$actaConfiguracion = new ActaConfiguracion;
$actaConfiguracion->create(
$request->only(['nombre',
    'director',
    'aprobacion_persona',
    'nombre_del_rol',
    'persona_asignada',
    'responsabilidades',
    'niveles_de_autoridades',
    'documentos',
    'formato',
    'acceso_rapido_necesario',
    'disponibilidad_amplia_necesaria',
    'seguridad_acceso',
    'recuperacion_informacion',
    'retencion_informacion',
    'codigo_del_item de_configuración',
    'nombre_item_de_configuracion',
    'categoria',
    'fuente',
    'formato',
    'gestion_del_cambio',
    'contabilidad_de_estado_y_metricas',
    'verificacion_y_auditorias',
    'objetivos_y_alcance_del_plan',
    'rol',
    'funciones_y_responsabilidades',
    'entregables',
    'normas_de_identificacionEntregable',
    'responsableEntregable',
    'documento',
    'normas_de_identificacionDocumento',
    'responsableDocumento',
    'procedimiento_para_control_de_cambio',
    'plan_de_gestion_de_cambio',
    'codigo_documento',
    'fecha_aprobacion',
    'responsable',
    'comunicacion_de_cambios_a_interesados',
    'procedimiento_y_niveles_de_aprobacion',
    'procedimiento_de_auditoria_en_la_gestion_de_la_configuracion',
    'documento_adjunto',
    'descripcion'

])
);
return response()->json($actaConfiguracion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function show(ActaConfiguracion $actaConfiguracion)
    {
        return response()->json($actaConfiguracion);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaConfiguracion $actaConfiguracion)
    {
        $this->validate($request, [
    'nombre',
    'director',
    'aprobacion_persona',
    'nombre_del_rol',
    'persona_asignada',
    'responsabilidades',
    'niveles_de_autoridades',
    'documentos',
    'formato',
    'acceso_rapido_necesario',
    'disponibilidad_amplia_necesaria',
    'seguridad_acceso',
    'recuperacion_informacion',
    'retencion_informacion',
    'codigo_del_item_de_configuración',
    'nombre_item_de_configuracion',
    'categoria',
    'fuente',
    'formato',
    'gestion_del_cambio',
    'contabilidad_de_estado_y_metricas',
    'verificacion_y_auditorias',
    'objetivos_y_alcance_del_plan',
    'rol',
    'funciones_y_responsabilidades',
    'entregables',
    'normas_de_identificacionEntregable',
    'responsableEntregable',
    'documento',
    'normas_de_identificacionDocumento',
    'responsableDocumento',
    'procedimiento_para_control_de_cambio',
    'plan_de_gestion_de_cambio',
    'codigo_documento',
    'fecha_aprobacion',
    'responsable',
    'comunicacion_de_cambios_a_interesados',
    'procedimiento_y_niveles_de_aprobacion',
    'procedimiento_de_auditoria_en_la_gestion_de_la_configuracion',
    'documento_adjunto',
    'descripcion'
            
        ]);

        $actaConfiguracion->nombre = $request->nombre;
        $actaConfiguracion->director = $request->director;
        $actaConfiguracion->aprobacion_persona = $request->aprobacion_persona;
        $actaConfiguracion->nombre_del_rol = $request->nombre_del_rol;
        $actaConfiguracion->persona_asignada = $request->persona_asignada;
        $actaConfiguracion->responsabilidades = $request->responsabilidades;
        $actaConfiguracion->niveles_de_autoridades = $request->niveles_de_autoridades;
        $actaConfiguracion->documentos = $request->documentos;
        $actaConfiguracion->formato = $request->formato;
        $actaConfiguracion->acceso_rapido_necesario= $request->acceso_rapido_necesario;
        $actaConfiguracion->disponibilidad_amplia_necesaria = $request->disponibilidad_amplia_necesaria;
        $actaConfiguracion->seguridad_acceso = $request->seguridad_acceso;
        $actaConfiguracion->recuperacion_informacion = $request->recuperacion_informacion;
        $actaConfiguracion->retencion_informacion = $request->retencion_informacion;
        $actaConfiguracion->codigo_del_item_de_configuración = $request->codigo_del_item_de_configuración;
        $actaConfiguracion->nombre_item_de_configuracion = $request->nombre_item_de_configuracion;
        $actaConfiguracion->categoria = $request->categoria;
        $actaConfiguracion->fuente = $request->fuente;
        $actaConfiguracion->formato = $request->formato;
        $actaConfiguracion->gestion_del_cambio = $request->gestion_del_cambio;
        $actaConfiguracion->contabilidad_de_estado_y_metricas = $request->contabilidad_de_estado_y_metricas;
        $actaConfiguracion->verificacion_y_auditorias = $request->verificacion_y_auditorias;
        $actaConfiguracion->objetivos_y_alcance_del_plan = $request->objetivos_y_alcance_del_plan;
        $actaConfiguracion->rol = $request->rol;
        $actaConfiguracion->funciones_y_responsabilidades = $request->funciones_y_responsabilidades;
        $actaConfiguracion->entregables = $request->entregables;
        $actaConfiguracion->normas_de_identificacionEntregable = $request->normas_de_identificacionEntregable;
        $actaConfiguracion->responsableEntregable = $request->responsableEntregable;
        $actaConfiguracion->documento = $request->documento;
        $actaConfiguracion->normas_de_identificacionDocumento = $request->normas_de_identificacionDocumento;
        $actaConfiguracion->responsableDocumento = $request->responsableDocumento;
        $actaConfiguracion->procedimiento_para_control_de_cambio = $request->procedimiento_para_control_de_cambio;
        $actaConfiguracion->plan_de_gestion_de_cambio = $request->plan_de_gestion_de_cambio;
        $actaConfiguracion->codigo_documento = $request->codigo_documento;
        $actaConfiguracion->fecha_aprobacion = $request->fecha_aprobacion;
        $actaConfiguracion->responsable = $request->responsable;
        $actaConfiguracion->comunicacion_de_cambios_a_interesados = $request->comunicacion_de_cambios_a_interesados;
        $actaConfiguracion->procedimiento_y_niveles_de_aprobacion = $request->procedimiento_y_niveles_de_aprobacion;
        $actaConfiguracion->procedimiento_de_auditoria_en_la_gestion_de_la_configuracion = $request->procedimiento_de_auditoria_en_la_gestion_de_la_configuracion;
        $actaConfiguracion->documento_adjunto = $request->documento_adjunto;
        $actaConfiguracion->descripcion = $request->descripcion;

        $actaConfiguracion->save();
        return response()->json($actaConfiguracion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActaConfiguracion $actaConfiguracion)
    {
        $actaConfiguracion->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

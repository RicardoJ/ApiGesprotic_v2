<?php

namespace App\Http\Controllers;

use App\ActaPlanDirector;
use App\Project;
use Illuminate\Http\Request;

class ActaPlanDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ActaPlanDirector::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_id)
    {
        $this->validate($request, [
                            'nombre'=> 'required',
                            'director_del_proyecto'=> 'required',
                           /* 'persona_revision'=> 'required', 
                            'persona_aprobacion'=> 'required',
                            'fases'=> 'required', 
                            'procesos'=> 'required',
                            'entradas'=> 'required', 
                            'salidas'=> 'required',
                            'interaccion'=> 'required', 
                            'gestion_cronograma_tiempo'=> 'required',
                            'umbral_varacion_tiempo'=> 'required', 
                            'seguimiento_tiempo'=> 'required',
                            'gestion_cronograma_coste'=> 'required',
                            'umbral_varacion_coste'=> 'required', 
                            'seguimiento_coste'=> 'required',
                            'gestion_cronograma_alcance'=> 'required',
                            'umbral_varacion_alcance'=> 'required', 
                            'seguimiento_alcance'=> 'required',
                            'gestion_cronograma_calidad'=> 'required',
                            'umbral_varacion_calidad'=> 'required', 
                            'seguimiento_calidad'=> 'required',
                            'descripcion_gestionAlcance'=> 'required',
                            'descripcion_gestionCronograma'=> 'required',
                            'descripcion_gestionCostes'=> 'required', 
                            'descripcion_gestionCalidad'=> 'required',
                            'descripcion_gestionRiesgos'=> 'required',
                            'descripcion_gestionComunicaciones'=> 'required',
                            'descripcion_gestionRecursos'=> 'required',
                            'descripcion_gestionRequisitos'=> 'required',
                            'descripcion_gestionAdquisiciones'=> 'required',
                            'descripcion_gestionConfiguracion'=> 'required',
                            'descripcion_gestionInteresados'=> 'required',
                            'descripcion_gestionControlCambio'=> 'required',
                            'descripcion_gestionMejoraProcesos'=> 'required',
                            'procesos_comunicacion_con_interesados'=> 'required',
                            'medidas_de_adaptacion_necesarias_en_los_procesos'=> 'required', 
                            'aspectos_claves_y_decisiones_pendientes'=> 'required',
                            'proceso_de_revision_del_planDelDirector'=> 'required', 
                            'documento_adjuntos'=> 'required',
                            'descripcion_documento'=> 'required' */
            
                                            ]);
 $project=Project::find($project_id);
 if (!$project) {
    return response()->json(['No existe proyecto'],404);
}else{
    $actaPlanDirector = $project->actaPlanDirector;
    if ($actaPlanDirector) {
        return response()->json(['ya tiene acta de plan de Director  este proyecto'],404);
    } else {
$actaPlanDirector = new ActaPlanDirector([
    'nombre' =>$request->input('nombre'),
    'director_del_proyecto'=>$request->input('director_del_proyecto'),
    'project_id'=>$project_id
]);
$actaPlanDirector->save();
return response()->json($actaPlanDirector);
    }
}
/*$actaPlanDirector->create(
$request->only([
    'nombre',
                            'director_del_proyecto',
                            'persona_revision', 
                            'persona_aprobacion',
                            'fases', 
                            'procesos',
                            'entradas', 
                            'salidas',
                            'interaccion', 
                            'gestion_cronograma_tiempo',
                            'umbral_varacion_tiempo', 
                            'seguimiento_tiempo',
                            'gestion_cronograma_coste',
                            'umbral_varacion_coste', 
                            'seguimiento_coste',
                            'gestion_cronograma_alcance',
                            'umbral_varacion_alcance', 
                            'seguimiento_alcance',
                            'gestion_cronograma_calidad',
                            'umbral_varacion_calidad', 
                            'seguimiento_calidad',
                            'descripcion_gestionAlcance',
                            'descripcion_gestionCronograma',
                            'descripcion_gestionCostes', 
                            'descripcion_gestionCalidad',
                            'descripcion_gestionRiesgos',
                            'descripcion_gestionComunicaciones',
                            'descripcion_gestionRecursos',
                            'descripcion_gestionRequisitos',
                            'descripcion_gestionAdquisiciones',
                            'descripcion_gestionConfiguracion',
                            'descripcion_gestionInteresados',
                            'descripcion_gestionControlCambio',
                            'descripcion_gestionMejoraProcesos',
                            'procesos_comunicacion_con_interesados',
                            'medidas_de_adaptacion_necesarias_en_los_procesos', 
                            'aspectos_claves_y_decisiones_pendientes',
                            'proceso_de_revision_del_planDelDirector', 
                            'documento_adjuntos',
                            'descripcion_documento'

])
);
return response()->json($actaPlanDirector);
*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActaPlanDirector  $actaPlanDirector
     * @return \Illuminate\Http\Response
     */
    public function show(ActaPlanDirector $actaPlanDirector)
    {
        return response()->json($actaPlanDirector);
    }

    public function listaActaPlanDirectorPorProyecto($project_id){
        $project =Project::find($project_id);
       
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $actaPlanDirector = $project->actaPlanDirector;
        return response()->json(['Acta de Riesgo del proyecto'=>$actaPlanDirector],202);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaPlanDirector  $actaPlanDirector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaPlanDirector $actaPlanDirector)
    {
        $this->validate($request, [
            'nombre',
            'director_del_proyecto',
           /* 'persona_revision', 
            'persona_aprobacion',
            'fases', 
            'procesos',
            'entradas', 
            'salidas',
            'interaccion', 
            'gestion_cronograma_tiempo',
            'umbral_varacion_tiempo', 
            'seguimiento_tiempo',
            'gestion_cronograma_coste',
            'umbral_varacion_coste', 
            'seguimiento_coste',
            'gestion_cronograma_alcance',
            'umbral_varacion_alcance', 
            'seguimiento_alcance',
            'gestion_cronograma_calidad',
            'umbral_varacion_calidad', 
            'seguimiento_calidad',
            'descripcion_gestionAlcance',
            'descripcion_gestionCronograma',
            'descripcion_gestionCostes', 
            'descripcion_gestionCalidad',
            'descripcion_gestionRiesgos',
            'descripcion_gestionComunicaciones',
            'descripcion_gestionRecursos',
            'descripcion_gestionRequisitos',
            'descripcion_gestionAdquisiciones',
            'descripcion_gestionConfiguracion',
            'descripcion_gestionInteresados',
            'descripcion_gestionControlCambio',
            'descripcion_gestionMejoraProcesos',
            'procesos_comunicacion_con_interesados',
            'medidas_de_adaptacion_necesarias_en_los_procesos', 
            'aspectos_claves_y_decisiones_pendientes',
            'proceso_de_revision_del_planDelDirector', 
            'documento_adjuntos',
            'descripcion_documento'
                    */
                ]);
        
                $actaPlanDirector->nombre = $request->nombre;
                $actaPlanDirector->director_del_proyecto = $request->director_del_proyecto;
             /*   $actaPlanDirector->persona_revision = $request->persona_revision;
                $actaPlanDirector->persona_aprobacion = $request->persona_aprobacion;
                $actaPlanDirector->fases = $request->fases;
                $actaPlanDirector->procesos = $request->procesos;
                $actaPlanDirector->entradas = $request->entradas;
                $actaPlanDirector->salidas = $request->salidas;
                $actaPlanDirector->interaccion = $request->interaccion;
                $actaPlanDirector->gestion_cronograma_tiempo= $request->gestion_cronograma_tiempo;
                $actaPlanDirector->umbral_varacion_tiempo = $request->umbral_varacion_tiempo;
                $actaPlanDirector->seguimiento_tiempo = $request->seguimiento_tiempo;
                $actaPlanDirector->gestion_cronograma_coste = $request->gestion_cronograma_coste;
                $actaPlanDirector->umbral_varacion_coste = $request->umbral_varacion_coste;
                $actaPlanDirector->seguimiento_coste = $request->seguimiento_coste;
                $actaPlanDirector->gestion_cronograma_alcance = $request->gestion_cronograma_alcance;
                $actaPlanDirector->umbral_varacion_alcance = $request->umbral_varacion_alcance;
                $actaPlanDirector->seguimiento_alcance = $request->seguimiento_alcance;
                $actaPlanDirector->gestion_cronograma_calidad = $request->gestion_cronograma_calidad;
                $actaPlanDirector->umbral_varacion_calidad = $request->umbral_varacion_calidad;
                $actaPlanDirector->seguimiento_calidad = $request->seguimiento_calidad;
                $actaPlanDirector->descripcion_gestionAlcance = $request->descripcion_gestionAlcance;
                $actaPlanDirector->descripcion_gestionCronograma = $request->descripcion_gestionCronograma;
                $actaPlanDirector->descripcion_gestionCostes = $request->descripcion_gestionCostes;
                $actaPlanDirector->descripcion_gestionCalidad = $request->descripcion_gestionCalidad;
                $actaPlanDirector->descripcion_gestionRiesgos = $request->descripcion_gestionRiesgos;
                $actaPlanDirector->descripcion_gestionComunicaciones = $request->descripcion_gestionComunicaciones;
                $actaPlanDirector->descripcion_gestionRecursos = $request->descripcion_gestionRecursos;
                $actaPlanDirector->descripcion_gestionRequisitos = $request->descripcion_gestionRequisitos;
                $actaPlanDirector->descripcion_gestionAdquisiciones = $request->descripcion_gestionAdquisiciones;
                $actaPlanDirector->descripcion_gestionConfiguracion = $request->descripcion_gestionConfiguracion;
                $actaPlanDirector->descripcion_gestionInteresados = $request->descripcion_gestionInteresados;
                $actaPlanDirector->descripcion_gestionControlCambio = $request->descripcion_gestionControlCambio;
                $actaPlanDirector->descripcion_gestionMejoraProcesos = $request->descripcion_gestionMejoraProcesos;
                $actaPlanDirector->procesos_comunicacion_con_interesados = $request->procesos_comunicacion_con_interesados;
                $actaPlanDirector->medidas_de_adaptacion_necesarias_en_los_procesos = $request->medidas_de_adaptacion_necesarias_en_los_procesos;
                $actaPlanDirector->aspectos_claves_y_decisiones_pendientes = $request->aspectos_claves_y_decisiones_pendientes;
                $actaPlanDirector->proceso_de_revision_del_planDelDirector = $request->proceso_de_revision_del_planDelDirector;
                $actaPlanDirector->documento_adjuntos = $request->documento_adjuntos;
                $actaPlanDirector->descripcion_documento = $request->descripcion_documento;
*/
                $actaPlanDirector->save();
                return response()->json($actaPlanDirector);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActaPlanDirector  $actaPlanDirector
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActaPlanDirector $actaPlanDirector)
    {
        $actaPlanDirector->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

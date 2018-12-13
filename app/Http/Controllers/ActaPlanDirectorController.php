<?php
namespace App\Http\Controllers;
use Validator;
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
        $validator = Validator::make($request->all(),[
                            'revision_persona1'=> 'required',
                            'revision_firma'=> 'required',
                            'aprobacion_persona2'=> 'required',
                            'aprobacion_firma'=> 'required',
                            
                            'ciclo_vida_fases'=> 'required',
                            'ciclo_vida_procesos'=> 'required',
                            'ciclo_vida_entradas'=> 'required',
                            'ciclo_vida_salidas'=> 'required',
                            'ciclo_vida_interacion'=> 'required',
                            'ciclo_vida_cerrarFase'=> 'required',
                            
                            'gestion_cronograma'=> 'required',
                            'umbral_cronograma_variacion'=> 'required',
                            'cronograma_seguimiento_y_control'=> 'required',
                            
                            'gestion_coste'=> 'required',
                            'umbral_coste_variacion'=> 'required',
                            'coste_seguimiento_y_control'=> 'required',
                            
                            'gestion_alcance'=> 'required',
                            'umbral_alcance_variacion'=> 'required',
                            'alcance_seguimiento_y_control'=> 'required',
                            
                            'gestion_calidad'=> 'required',
                            'umbral_calidad_variacion'=> 'required',
                            'calidad_seguimiento_y_control'=> 'required',
                            
                            'persona_gestionAlcance'=> 'required',
                            'persona_gestionCronograma'=> 'required',
                            'persona_gestionCostes'=> 'required',
                            'persona_gestionCalidad'=> 'required',
                            'persona_gestionRiesgos'=> 'required',
                            'persona_gestionComunicaciones'=> 'required',
                            'persona_gestionRecursos'=> 'required',
                            'persona_gestionRequisitos'=> 'required',
                            'persona_gestionAdquisiciones'=> 'required',
                            'persona_gestionConfiguracion'=> 'required',
                            'persona_gestionInteresados'=> 'required',
                            'persona_gestionControlCambio'=> 'required',
                            'persona_mejoraProcesos'=> 'required',
                            
                            'proceso_de_comunicacion_stakeholders'=> 'required',
                            'medidas_adaptacion'=> 'required',
                            'aspectos_claves'=> 'required',
                            'procesos_revision'=> 'required',
                            'documento'=> 'required',
                            'resumen_documento'=> 'required'
            
                                            ]);
                           if ($validator->fails()) {
                       return response()->json(['Error'],404);
                                }else{
 $project=Project::findOrFail($project_id);
 if (!$project) {
    return response()->json(['No existe proyecto'],404);
}else{
    $actaPlanDirector = $project->actaPlanDirector;
    if ($actaPlanDirector) {
        return response()->json(['ya tiene acta de plan de Director  este proyecto'],404);
    } else {
$actaPlanDirector = new ActaPlanDirector([
    'revision_persona1' =>$request->input('revision_persona1'),
    'revision_firma'=>$request->input('revision_firma'),
    'aprobacion_persona2'=> $request->input('aprobacion_persona2'),
                           'aprobacion_firma'=> $request->input('aprobacion_firma'),
                            
                            'ciclo_vida_fases'=>$request->input('ciclo_vida_fases'),
                            'ciclo_vida_procesos'=>$request->input('ciclo_vida_procesos'),
                            'ciclo_vida_entradas'=> $request->input('ciclo_vida_entradas'),
                            'ciclo_vida_salidas'=> $request->input('ciclo_vida_salidas'),
                            'ciclo_vida_interacion'=> $request->input('ciclo_vida_interacion'),
                            'ciclo_vida_cerrarFase'=> $request->input('ciclo_vida_cerrarFase'),
                            
                            'gestion_cronograma'=> $request->input('gestion_cronograma'),
                            'umbral_cronograma_variacion'=> $request->input('umbral_cronograma_variacion'),
                            'cronograma_seguimiento_y_control'=> $request->input('cronograma_seguimiento_y_control'),
                            
                            'gestion_coste'=> $request->input('gestion_coste'),
                            'umbral_coste_variacion'=> $request->input('umbral_coste_variacion'),
                            'coste_seguimiento_y_control'=> $request->input('coste_seguimiento_y_control'),
                            
                            'gestion_alcance'=> $request->input('gestion_alcance'),
                            'umbral_alcance_variacion'=> $request->input('umbral_alcance_variacion'),
                            'alcance_seguimiento_y_control'=> $request->input('alcance_seguimiento_y_control'),
                            
                            'gestion_calidad'=> $request->input('gestion_calidad'),
                            'umbral_calidad_variacion'=> $request->input('umbral_calidad_variacion'),
                            'calidad_seguimiento_y_control'=> $request->input('calidad_seguimiento_y_control'),
                            
                            'persona_gestionAlcance'=>  $request->input('persona_gestionAlcance'),
                            'persona_gestionCronograma'=>  $request->input('persona_gestionCronograma'),
                            'persona_gestionCostes'=>  $request->input('persona_gestionCostes'),
                            'persona_gestionCalidad'=>  $request->input('persona_gestionCalidad'),
                            'persona_gestionRiesgos'=>  $request->input('persona_gestionRiesgos'),
                            'persona_gestionComunicaciones'=>  $request->input('persona_gestionComunicaciones'),
                            'persona_gestionRecursos'=>  $request->input('persona_gestionRecursos'),
                            'persona_gestionRequisitos'=>  $request->input('persona_gestionRequisitos'),
                            'persona_gestionAdquisiciones'=>  $request->input('persona_gestionAdquisiciones'),
                            'persona_gestionConfiguracion'=>  $request->input('persona_gestionConfiguracion'),
                            'persona_gestionInteresados'=>  $request->input('persona_gestionInteresados'),
                            'persona_gestionControlCambio'=>  $request->input('persona_gestionControlCambio'),
                            'persona_mejoraProcesos'=>  $request->input('persona_mejoraProcesos'),
                            
                            'proceso_de_comunicacion_stakeholders'=>  $request->input('proceso_de_comunicacion_stakeholders'),
                            'medidas_adaptacion'=>  $request->input('medidas_adaptacion'),
                            'aspectos_claves'=>  $request->input('aspectos_claves'),
                            'procesos_revision'=>  $request->input('procesos_revision'),
                            'documento'=>  $request->input('documento'),
                            'resumen_documento'=>  $request->input('resumen_documento'), 
    'project_id'=>$project_id
]);
$actaPlanDirector->save();
return response()->json($actaPlanDirector);
    }
}
    }
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
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaPlanDirector  $actaPlanDirector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaPlanDirector $actaPlanDirector)
    {
        $validator = Validator::make($request->all(),[
            'revision_persona1'=> 'required',
            'revision_firma'=> 'required',
            'aprobacion_persona2'=> 'required',
            'aprobacion_firma'=> 'required',
            
            'ciclo_vida_fases'=> 'required',
            'ciclo_vida_procesos'=> 'required',
            'ciclo_vida_entradas'=> 'required',
            'ciclo_vida_salidas'=> 'required',
            'ciclo_vida_interacion'=> 'required',
            'ciclo_vida_cerrarFase'=> 'required',
            
            'gestion_cronograma'=> 'required',
            'umbral_cronograma_variacion'=> 'required',
            'cronograma_seguimiento_y_control'=> 'required',
            
            'gestion_coste'=> 'required',
            'umbral_coste_variacion'=> 'required',
            'coste_seguimiento_y_control'=> 'required',
            
            'gestion_alcance'=> 'required',
            'umbral_alcance_variacion'=> 'required',
            'alcance_seguimiento_y_control'=> 'required',
            
            'gestion_calidad'=> 'required',
            'umbral_calidad_variacion'=> 'required',
            'calidad_seguimiento_y_control'=> 'required',
            
            'persona_gestionAlcance'=> 'required',
            'persona_gestionCronograma'=> 'required',
            'persona_gestionCostes'=> 'required',
            'persona_gestionCalidad'=> 'required',
            'persona_gestionRiesgos'=> 'required',
            'persona_gestionComunicaciones'=> 'required',
            'persona_gestionRecursos'=> 'required',
            'persona_gestionRequisitos'=> 'required',
            'persona_gestionAdquisiciones'=> 'required',
            'persona_gestionConfiguracion'=> 'required',
            'persona_gestionInteresados'=> 'required',
            'persona_gestionControlCambio'=> 'required',
            'persona_mejoraProcesos'=> 'required',
            
            'proceso_de_comunicacion_stakeholders'=> 'required',
            'medidas_adaptacion'=> 'required',
            'aspectos_claves'=> 'required',
            'procesos_revision'=> 'required',
            'documento'=> 'required',
            'resumen_documento'=> 'required' 
                ]);
                if ($validator->fails()) {
                    return response()->json(['Error'],404);
        
                }else{
                $actaPlanDirector->revision_persona1 = $request->revision_persona1;
                $actaPlanDirector->revision_firma = $request->revision_firma;
                $actaPlanDirector->aprobacion_persona2 = $request->aprobacion_persona2;
                $actaPlanDirector->aprobacion_firma = $request->aprobacion_firma;
                
                $actaPlanDirector->ciclo_vida_fases = $request->ciclo_vida_fases;
                $actaPlanDirector->ciclo_vida_procesos = $request->ciclo_vida_procesos;
                $actaPlanDirector->ciclo_vida_entradas = $request->ciclo_vida_entradas;
                $actaPlanDirector->ciclo_vida_salidas = $request->ciclo_vida_salidas;
                $actaPlanDirector->ciclo_vida_interacion = $request->ciclo_vida_interacion;
                $actaPlanDirector->ciclo_vida_cerrarFase = $request->ciclo_vida_cerrarFase;
                $actaPlanDirector->gestion_cronograma = $request->gestion_cronograma;
                $actaPlanDirector->umbral_cronograma_variacion = $request->umbral_cronograma_variacion;
                $actaPlanDirector->cronograma_seguimiento_y_control = $request->cronograma_seguimiento_y_control;
                $actaPlanDirector->gestion_coste = $request->gestion_coste;
                $actaPlanDirector->umbral_coste_variacion = $request->umbral_coste_variacion;
                $actaPlanDirector->coste_seguimiento_y_control = $request->coste_seguimiento_y_control;
                $actaPlanDirector->gestion_alcance = $request->gestion_alcance;
                $actaPlanDirector->umbral_alcance_variacion = $request->umbral_alcance_variacion;
                $actaPlanDirector->alcance_seguimiento_y_control = $request->alcance_seguimiento_y_control;
                $actaPlanDirector->gestion_calidad = $request->gestion_calidad;
                $actaPlanDirector->umbral_calidad_variacion = $request->umbral_calidad_variacion;
                $actaPlanDirector->calidad_seguimiento_y_control = $request->calidad_seguimiento_y_control;
                $actaPlanDirector->persona_gestionAlcance = $request->persona_gestionAlcance;
                $actaPlanDirector->persona_gestionCronograma = $request->persona_gestionCronograma;
                $actaPlanDirector->persona_gestionCostes = $request->persona_gestionCostes;
                $actaPlanDirector->persona_gestionCalidad = $request->persona_gestionCalidad;
                $actaPlanDirector->persona_gestionRiesgos = $request->persona_gestionRiesgos;
                $actaPlanDirector->persona_gestionComunicaciones = $request->persona_gestionComunicaciones;
                $actaPlanDirector->persona_gestionRecursos = $request->persona_gestionRecursos;
                $actaPlanDirector->persona_gestionRequisitos = $request->persona_gestionRequisitos;
                $actaPlanDirector->persona_gestionAdquisiciones = $request->persona_gestionAdquisiciones;
                $actaPlanDirector->persona_gestionConfiguracion = $request->persona_gestionConfiguracion;
                $actaPlanDirector->persona_gestionInteresados = $request->persona_gestionInteresados;
                $actaPlanDirector->persona_gestionControlCambio = $request->persona_gestionControlCambio;
                $actaPlanDirector->persona_mejoraProcesos = $request->persona_mejoraProcesos;
                $actaPlanDirector->proceso_de_comunicacion_stakeholders = $request->proceso_de_comunicacion_stakeholders;
                $actaPlanDirector->medidas_adaptacion = $request->medidas_adaptacion;
                $actaPlanDirector->aspectos_claves = $request->aspectos_claves;
                $actaPlanDirector->procesos_revision = $request->procesos_revision;
                $actaPlanDirector->documento = $request->documento;
                $actaPlanDirector->resumen_documento = $request->resumen_documento;
            
                $actaPlanDirector->save();
                return response()->json($actaPlanDirector);
    }
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
<?php
namespace App\Http\Controllers;
use Validator;
use App\Project_team;
use App\TeamManagement;
use Illuminate\Http\Request;
class TeamManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TeamManagement::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_team_id)
    {
        $validator = Validator::make($request->all(),[
            'miembroDelEquipo_persona'=>'required',
            'miembroDelEquipo_rol'=>'required',
            'periodo_desde'=>'required',
            'periodo_hasta'=>'required',
        /*    'fecha_de_estado'=>'required',
            
            'objetivo_alcance_indicadores'=>'required',
            'comentarios_alcance'=>'required',
            'check_superadas_alcance'=>'required',
            'check_alcanzadas_alcance'=>'required',
            'check_mejora_alcance'=>'required',
            
            'objetivo_calidad_indicadores'=>'required',
            'comentarios_calidad'=>'required',
            'check_superadas_calidad'=>'required',
            'check_alcanzadas_calidad'=>'required',
            'check_mejora_calidad'=>'required',
            
            'objetivo_planificacion_indicadores'=>'required',
            'comentarios_planificacion'=>'required',
            'check_superadas_planificacion'=>'required',
            'check_alcanzadas_planificacion'=>'required',
            'check_mejora_planificacion'=>'required',
            
            'objetivo_presupuesto_indicadores'=>'required',
            'comentarios_presupuesto'=>'required',
            'check_superadas_presupuesto'=>'required',
            'check_alcanzadas_presupuesto'=>'required',
            'check_mejora_presupuesto'=>'required',
            
            'objetivo_interpersonales_indicadores'=>'required',
            'comentarios_interpersonales'=>'required',
            'check_superadas_interpersonales'=>'required',
            'check_alcanzadas_interpersonales'=>'required',
            'check_mejora_interpersonales'=>'required',
            
            'comunicacion_indicadores'=>'required',
            'comentarios_comunicacion'=>'required',
            'check_superadas_comunicacion'=>'required',
            'check_alcanzadas_comunicacion'=>'required',
            'check_mejora_comunicacion'=>'required',
            
            'trabajoEquipo_indicadores'=>'required',
            'comentarios_trabajoEquipo'=>'required',
            'check_superadas_trabajoEquipo'=>'required',
            'check_alcanzadas_trabajoEquipo'=>'required',
            'check_mejora_trabajoEquipo'=>'required',
            
            'tomaDesiciones_indicadores'=>'required',
            'comentarios_tomaDesiciones'=>'required',
            'check_superadas_tomaDesiciones'=>'required',
            'check_alcanzadas_tomaDesiciones'=>'required',
            'check_mejora_tomaDesiciones'=>'required',
            
            'gestionConflictos_indicadores'=>'required',
            'comentarios_gestionConflictos'=>'required',
            'check_superadas_gestionConflictos'=>'required',
            'check_alcanzadas_gestionConflictos'=>'required',
            'check_mejora_gestionConflictos'=>'required',
            
            'asertividad_indicadores'=>'required',
            'comentarios_asertividad'=>'required',
            'check_superadas_asertividad'=>'required',
            'check_alcanzadas_asertividad'=>'required',
            'check_mejora_asertividad'=>'required',
            
            
            'vision_estrategica'=>'required',
            'fortalezas_personales'=>'required',
            'area_mejoras'=>'required',
            'accion_desarrollo'=>'required',
            'plazo'=>'required',
            
            'justificacion_proyecto'=>'required',
            
            'comentarios_adicionales'=>'required' */
            
]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $project_team=Project_team::findOrFail($project_team_id);
        if (!$project_team) {
            return response()->json(['No existe equipo'],404);
        }else{
            $teamManagement = $project_team->teamManagement;
            if ($teamManagement) {
                return response()->json(['ya tiene gestion este equipo'],404);
            } else {
        $teamManagement = new TeamManagement([
            'miembroDelEquipo_persona'=>$request->input('miembroDelEquipo_persona'),
            'miembroDelEquipo_rol'=>$request->input('miembroDelEquipo_rol'),
            'periodo_desde'=>$request->input('periodo_desde'),
            'periodo_hasta'=>$request->input('periodo_hasta'),
      /*      'fecha_de_estado'=>$request->input('fecha_de_estado'),
            
            'objetivo_alcance_indicadores'=>$request->input('objetivo_alcance_indicadores'),
            'comentarios_alcance'=>$request->input('comentarios_alcance'),
            'check_superadas_alcance'=>$request->has('check_superadas_alcance') ? true : false ,
            'check_alcanzadas_alcance'=>$request->has('check_alcanzadas_alcance') ? true : false ,
            'check_mejora_alcance'=>$request->has('check_mejora_alcance') ? true : false ,
            
            'objetivo_calidad_indicadores'=>$request->input('objetivo_calidad_indicadores'),
            'comentarios_calidad'=>$request->input('comentarios_calidad'),
            'check_superadas_calidad'=>$request->has('check_superadas_calidad') ? true : false ,
            'check_alcanzadas_calidad'=>$request->has('check_alcanzadas_calidad') ? true : false ,
            'check_mejora_calidad'=>$request->has('check_mejora_calidad') ? true : false ,
            
            'objetivo_planificacion_indicadores'=>$request->input('objetivo_planificacion_indicadores'),
            'comentarios_planificacion'=>$request->input('comentarios_planificacion'),
            'check_superadas_planificacion'=>$request->has('check_superadas_planificacion') ? true : false ,
            'check_alcanzadas_planificacion'=>$request->has('check_alcanzadas_planificacion') ? true : false ,
            'check_mejora_planificacion'=>$request->has('check_mejora_planificacion') ? true : false ,
            
            'objetivo_presupuesto_indicadores'=>$request->input('objetivo_presupuesto_indicadores'),
            'comentarios_presupuesto'=>$request->input('comentarios_presupuesto'),
            'check_superadas_presupuesto'=>$request->has('check_superadas_presupuesto') ? true : false ,
            'check_alcanzadas_presupuesto'=>$request->has('check_alcanzadas_presupuesto') ? true : false ,
            'check_mejora_presupuesto'=>$request->has('check_mejora_presupuesto') ? true : false ,
            
            'objetivo_interpersonales_indicadores'=>$request->input('objetivo_interpersonales_indicadores'),
            'comentarios_interpersonales'=>$request->input('comentarios_interpersonales'),
            'check_superadas_interpersonales'=>$request->has('check_superadas_interpersonales') ? true : false ,
            'check_alcanzadas_interpersonales'=>$request->has('check_alcanzadas_interpersonales') ? true : false ,
            'check_mejora_interpersonales'=>$request->has('check_mejora_interpersonales') ? true : false ,
            
            'comunicacion_indicadores'=>$request->input('comunicacion_indicadores'),
            'comentarios_comunicacion'=>$request->input('comentarios_comunicacion'),
            'check_superadas_comunicacion'=>$request->has('check_superadas_comunicacion') ? true : false ,
            'check_alcanzadas_comunicacion'=>$request->has('check_alcanzadas_comunicacion') ? true : false ,
            'check_mejora_comunicacion'=>$request->has('check_mejora_comunicacion') ? true : false ,
            
            'trabajoEquipo_indicadores'=>$request->input('trabajoEquipo_indicadores'),
            'comentarios_trabajoEquipo'=>$request->input('comentarios_trabajoEquipo'),
            'check_superadas_trabajoEquipo'=>$request->has('check_superadas_trabajoEquipo') ? true : false ,
            'check_alcanzadas_trabajoEquipo'=>$request->has('check_alcanzadas_trabajoEquipo') ? true : false ,
            'check_mejora_trabajoEquipo'=>$request->has('check_mejora_trabajoEquipo') ? true : false ,
            
            'tomaDesiciones_indicadores'=>$request->input('tomaDesiciones_indicadores'),
            'comentarios_tomaDesiciones'=>$request->input('comentarios_tomaDesiciones'),
            'check_superadas_tomaDesiciones'=>$request->has('check_superadas_tomaDesiciones') ? true : false ,
            'check_alcanzadas_tomaDesiciones'=>$request->has('check_alcanzadas_tomaDesiciones') ? true : false ,
            'check_mejora_tomaDesiciones'=>$request->has('check_mejora_tomaDesiciones') ? true : false ,
            
            'gestionConflictos_indicadores'=>$request->input('gestionConflictos_indicadores'),
            'comentarios_gestionConflictos'=>$request->input('comentarios_gestionConflictos'),
            'check_superadas_gestionConflictos'=>$request->has('check_superadas_gestionConflictos') ? true : false ,
            'check_alcanzadas_gestionConflictos'=>$request->has('check_alcanzadas_gestionConflictos') ? true : false ,
            'check_mejora_gestionConflictos'=>$request->has('check_mejora_gestionConflictos') ? true : false ,
            
            'asertividad_indicadores'=>$request->input('asertividad_indicadores'),
            'comentarios_asertividad'=>$request->input('comentarios_asertividad'),
            'check_superadas_asertividad'=>$request->has('check_superadas_asertividad') ? true : false ,
            'check_alcanzadas_asertividad'=>$request->has('check_alcanzadas_asertividad') ? true : false ,
            'check_mejora_asertividad'=>$request->has('check_mejora_asertividad') ? true : false ,
            
            
            'vision_estrategica'=>$request->input('vision_estrategica'),
            'fortalezas_personales'=>$request->input('fortalezas_personales'),
            'area_mejoras'=>$request->input('area_mejoras'),
            'accion_desarrollo'=>$request->input('accion_desarrollo'),
            'plazo'=>$request->input('plazo'),
            
            'justificacion_proyecto'=>$request->input('justificacion_proyecto'),
            
            'comentarios_adicionales'=>$request->input('comentarios_adicionales'), */
            'project_team_id'=>$project_team_id
       
        ]);
        $teamManagement->save();
        return response()->json($teamManagement);
    }
}
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function show(TeamManagement $teamManagement)
    {
        return response()->json($teamManagement);
    }
    public function listarTeamMan($project_team_id){
        $project_team =Project_team::find($project_team_id);
       
        if (!$project_team) {
            return response()->json(['No existe el equipo'],404);
        }
        $teamManagement = $project_team->teamManagement;
        return response()->json(['gestion de equipo'=>$teamManagement],202);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamManagement $teamManagement)
    {
        $validator = Validator::make($request->all(),[
            'miembroDelEquipo_persona'=>'required',
            'miembroDelEquipo_rol'=>'required',
            'periodo_desde'=>'required',
            'periodo_hasta'=>'required',
         /*   'fecha_de_estado'=>'required',
            
            'objetivo_alcance_indicadores'=>'required',
            'comentarios_alcance'=>'required',
            'check_superadas_alcance'=>'required',
            'check_alcanzadas_alcance'=>'required',
            'check_mejora_alcance'=>'required',
            
            'objetivo_calidad_indicadores'=>'required',
            'comentarios_calidad'=>'required',
            'check_superadas_calidad'=>'required',
            'check_alcanzadas_calidad'=>'required',
            'check_mejora_calidad'=>'required',
            
            'objetivo_planificacion_indicadores'=>'required',
            'comentarios_planificacion'=>'required',
            'check_superadas_planificacion'=>'required',
            'check_alcanzadas_planificacion'=>'required',
            'check_mejora_planificacion'=>'required',
            
            'objetivo_presupuesto_indicadores'=>'required',
            'comentarios_presupuesto'=>'required',
            'check_superadas_presupuesto'=>'required',
            'check_alcanzadas_presupuesto'=>'required',
            'check_mejora_presupuesto'=>'required',
            
            'objetivo_interpersonales_indicadores'=>'required',
            'comentarios_interpersonales'=>'required',
            'check_superadas_interpersonales'=>'required',
            'check_alcanzadas_interpersonales'=>'required',
            'check_mejora_interpersonales'=>'required',
            
            'comunicacion_indicadores'=>'required',
            'comentarios_comunicacion'=>'required',
            'check_superadas_comunicacion'=>'required',
            'check_alcanzadas_comunicacion'=>'required',
            'check_mejora_comunicacion'=>'required',
            
            'trabajoEquipo_indicadores'=>'required',
            'comentarios_trabajoEquipo'=>'required',
            'check_superadas_trabajoEquipo'=>'required',
            'check_alcanzadas_trabajoEquipo'=>'required',
            'check_mejora_trabajoEquipo'=>'required',
            
            'tomaDesiciones_indicadores'=>'required',
            'comentarios_tomaDesiciones'=>'required',
            'check_superadas_tomaDesiciones'=>'required',
            'check_alcanzadas_tomaDesiciones'=>'required',
            'check_mejora_tomaDesiciones'=>'required',
            
            'gestionConflictos_indicadores'=>'required',
            'comentarios_gestionConflictos'=>'required',
            'check_superadas_gestionConflictos'=>'required',
            'check_alcanzadas_gestionConflictos'=>'required',
            'check_mejora_gestionConflictos'=>'required',
            
            'asertividad_indicadores'=>'required',
            'comentarios_asertividad'=>'required',
            'check_superadas_asertividad'=>'required',
            'check_alcanzadas_asertividad'=>'required',
            'check_mejora_asertividad'=>'required',
            
            
            'vision_estrategica'=>'required',
            'fortalezas_personales'=>'required',
            'area_mejoras'=>'required',
            'accion_desarrollo'=>'required',
            'plazo'=>'required',
            
            'justificacion_proyecto'=>'required',
            
            'comentarios_adicionales'=>'required'  */
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $teamManagement->miembroDelEquipo_persona = $request->miembroDelEquipo_persona;
        $teamManagement->miembroDelEquipo_rol = $request->miembroDelEquipo_rol;
        $teamManagement->periodo_desde = $request->periodo_desde;
        $teamManagement->periodo_hasta = $request->periodo_hasta;
    /*    $teamManagement->fecha_de_estado = $request->fecha_de_estado;
        $teamManagement->objetivo_alcance_indicadores = $request->objetivo_alcance_indicadores;
        $teamManagement->comentarios_alcance = $request->comentarios_alcance;
        $teamManagement->check_superadas_alcance = $request->check_superadas_alcance;
        $teamManagement->check_alcanzadas_alcance = $request->check_alcanzadas_alcance;
        $teamManagement->check_mejora_alcance = $request->check_mejora_alcance;
        $teamManagement->objetivo_calidad_indicadores = $request->objetivo_calidad_indicadores;
        $teamManagement->comentarios_calidad = $request->comentarios_calidad;
        $teamManagement->check_superadas_calidad = $request->check_superadas_calidad;
        $teamManagement->check_alcanzadas_calidad = $request->check_alcanzadas_calidad;
        $teamManagement->check_mejora_calidad = $request->check_mejora_calidad;
        $teamManagement->objetivo_planificacion_indicadores = $request->objetivo_planificacion_indicadores;
        $teamManagement->comentarios_planificacion = $request->comentarios_planificacion;
        $teamManagement->check_superadas_planificacion = $request->check_superadas_planificacion;
        $teamManagement->check_alcanzadas_planificacion = $request->check_alcanzadas_planificacion;
        $teamManagement->check_mejora_planificacion = $request->check_mejora_planificacion;
        $teamManagement->objetivo_presupuesto_indicadores = $request->objetivo_presupuesto_indicadores;
        $teamManagement->comentarios_presupuesto = $request->comentarios_presupuesto;
        $teamManagement->check_superadas_presupuesto = $request->check_superadas_presupuesto;
        $teamManagement->check_alcanzadas_presupuesto = $request->check_alcanzadas_presupuesto;
        $teamManagement->check_mejora_presupuesto = $request->check_mejora_presupuesto;
        $teamManagement->objetivo_interpersonales_indicadores = $request->objetivo_interpersonales_indicadores;
        $teamManagement->comentarios_interpersonales = $request->comentarios_interpersonales;
        $teamManagement->check_superadas_interpersonales = $request->check_superadas_interpersonales;
        $teamManagement->check_alcanzadas_interpersonales = $request->check_alcanzadas_interpersonales;
        $teamManagement->check_mejora_interpersonales = $request->check_mejora_interpersonales;
        $teamManagement->comunicacion_indicadores = $request->comunicacion_indicadores;
        $teamManagement->comentarios_comunicacion = $request->comentarios_comunicacion;
        $teamManagement->check_superadas_comunicacion = $request->check_superadas_comunicacion;
        $teamManagement->check_alcanzadas_comunicacion = $request->check_alcanzadas_comunicacion;
        $teamManagement->check_mejora_comunicacion = $request->check_mejora_comunicacion;
        $teamManagement->trabajoEquipo_indicadores = $request->trabajoEquipo_indicadores;
         $teamManagement->comentarios_trabajoEquipo = $request->comentarios_trabajoEquipo;
         $teamManagement->check_superadas_trabajoEquipo = $request->check_superadas_trabajoEquipo;
         $teamManagement->check_alcanzadas_trabajoEquipo = $request->check_alcanzadas_trabajoEquipo;
         $teamManagement->check_mejora_trabajoEquipo = $request->check_mejora_trabajoEquipo;
         $teamManagement->tomaDesiciones_indicadores = $request->tomaDesiciones_indicadores;
         $teamManagement->comentarios_tomaDesiciones = $request->comentarios_tomaDesiciones;
         $teamManagement->check_superadas_tomaDesiciones = $request->check_superadas_tomaDesiciones;
         $teamManagement->check_alcanzadas_tomaDesiciones = $request->check_alcanzadas_tomaDesiciones;
         $teamManagement->check_mejora_tomaDesiciones = $request->check_mejora_tomaDesiciones;
         $teamManagement->gestionConflictos_indicadores = $request->gestionConflictos_indicadores;
         $teamManagement->comentarios_gestionConflictos = $request->comentarios_gestionConflictos;
         $teamManagement->check_superadas_gestionConflictos = $request->check_superadas_gestionConflictos;
         $teamManagement->check_alcanzadas_gestionConflictos = $request->check_alcanzadas_gestionConflictos;
         $teamManagement->check_mejora_gestionConflictos = $request->check_mejora_gestionConflictos;
         $teamManagement->asertividad_indicadores = $request->asertividad_indicadores;
         $teamManagement->comentarios_asertividad = $request->comentarios_asertividad;
         $teamManagement->check_superadas_asertividad = $request->check_superadas_asertividad;
         $teamManagement->check_alcanzadas_asertividad = $request->check_alcanzadas_asertividad;
         $teamManagement->check_mejora_asertividad = $request->check_mejora_asertividad;
         $teamManagement->vision_estrategica = $request->vision_estrategica;
         $teamManagement->fortalezas_personales = $request->fortalezas_personales;
         $teamManagement->area_mejoras = $request->area_mejoras;
         $teamManagement->accion_desarrollo = $request->accion_desarrollo;
         $teamManagement->plazo = $request->plazo;
         $teamManagement->justificacion_proyecto = $request->justificacion_proyecto;
         $teamManagement->comentarios_adicionales = $request->comentarios_adicionales;*/
      
        $teamManagement->save();
        return response()->json($teamManagement);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamManagement  $teamManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamManagement $teamManagement)
    {
        $teamManagement->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
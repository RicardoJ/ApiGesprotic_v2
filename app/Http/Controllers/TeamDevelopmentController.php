<?php
namespace App\Http\Controllers;
use Validator;
use App\TeamDevelopment;
use App\Project_team;

use Illuminate\Http\Request;
class TeamDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TeamDevelopment::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$project_team_id)
    {
        $validator = Validator::make($request->all(),[
            'miembro_equipo_persona'=>'required',
            'miembro_equipo_rol'=>'required',
            'desde'=>'required',
            'hasta'=>'required',
            'fecha_estado'=>'required',
            'informe_id'=>'required',
            'actividades_planificadas'=>'required',
            'check_realizada'=>'required',
            'check_noRealizada'=>'required',
            'id_actividad_no_realizada'=>'required',
            'actividad_no_realizada'=>'required',
            'causa_actividad_no_realizada'=>'required',
            'id_actividad_no_planificada'=>'required',
            'actividad_mo_planificada'=>'required',
            'causa_actividad_no_planificada'=>'required',
            'fondos_planificados'=>'required',
            'fondos_consumidos'=>'required',
            'fondos_causa_desviacion'=>'required',
            'nivel_cumplidos'=>'required',
            'nivel_NoCumplidos'=>'required',
            'nivel_causas_desviacion'=>'required',
            'id_acciones_preventinas'=>'required',
            'acciones_preventinas_a_realizar'=>'required',
            'periodo_desde'=>'required',
            'periodo_hasta'=>'required',
            'proxima_fecha_revision'=>'required',
            'id_acciones_planificadas'=>'required',
            'acciones_planificadas'=>'required',
            'fondos_y_presupuesto'=>'required',
            'nuevos_riesgos'=>'required',
            'problemas_y_dificultades'=>'required',
            'otros_comentarios'=>'required' 
]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $project_team=Project_team::findOrFail($project_team_id);
        if (!$project_team) {
            return response()->json(['No existe equipo'],404);
        }else{
        $teamDevelopment = new TeamDevelopment([
            
        'miembro_equipo_persona'=>$request->input('miembro_equipo_persona'),
        'miembro_equipo_rol'=>$request->input('miembro_equipo_rol'),
        'desde'=>$request->input('desde'),
        'hasta'=>$request->input('hasta'),
        'fecha_estado'=>$request->input('fecha_estado'),
        'informe_id'=>$request->input('informe_id'),
        'actividades_planificadas'=>$request->input('actividades_planificadas'),
        'check_realizada'=>$request->has('check_realizada') ? true : false ,
        'check_noRealizada'=>$request->has('check_noRealizada') ? true : false ,
        'id_actividad_no_realizada'=>$request->input('id_actividad_no_realizada'),
        'actividad_no_realizada'=>$request->input('actividad_no_realizada'),
        'causa_actividad_no_realizada'=>$request->input('causa_actividad_no_realizada'),
        'id_actividad_no_planificada'=>$request->input('id_actividad_no_planificada'),
        'actividad_mo_planificada'=>$request->input('actividad_mo_planificada'),
        'causa_actividad_no_planificada'=>$request->input('causa_actividad_no_planificada'),
        'fondos_planificados'=>$request->input('fondos_planificados'),
        'fondos_consumidos'=>$request->input('fondos_consumidos'),
        'fondos_causa_desviacion'=>$request->input('fondos_causa_desviacion'),
        'nivel_cumplidos'=>$request->input('nivel_cumplidos'),
        'nivel_NoCumplidos'=>$request->input('nivel_NoCumplidos'),
        'nivel_causas_desviacion'=>$request->input('nivel_causas_desviacion'),
        'id_acciones_preventinas'=>$request->input('id_acciones_preventinas'),
        'acciones_preventinas_a_realizar'=>$request->input('acciones_preventinas_a_realizar'),
        'periodo_desde'=>$request->input('periodo_desde'),
        'periodo_hasta'=>$request->input('periodo_hasta'),
        'proxima_fecha_revision'=>$request->input('proxima_fecha_revision'),
        'id_acciones_planificadas'=>$request->input('id_acciones_planificadas'),
        'acciones_planificadas'=>$request->input('acciones_planificadas'),
        'fondos_y_presupuesto'=>$request->input('fondos_y_presupuesto'),
        'nuevos_riesgos'=>$request->input('nuevos_riesgos'),
        'problemas_y_dificultades'=>$request->input('problemas_y_dificultades'),
        'otros_comentarios'=>$request->input('otros_comentarios'), 
        'project_team_id'=>$project_team_id
        
        ]);
        $teamDevelopment->save();
        return response()->json($teamDevelopment);
    }
     
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TeamDevelopment  $teamDevelopment
     * @return \Illuminate\Http\Response
     */
    public function show(TeamDevelopment $teamDevelopment)
    {
        return response()->json($teamDevelopment);
    }
    public function listarTeamDev($project_team_id){
        $project_team =Project_team::find($project_team_id);
       
        if (!$project_team) {
            return response()->json(['No existe el equipo'],404);
        }
        $teamDevelopment = $project_team->teamDevelopment;
        return response()->json(['desarrollo de equipo'=>$teamDevelopment],202);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamDevelopment  $teamDevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamDevelopment $teamDevelopment)
    {
        $validator = Validator::make($request->all(),[
            'miembro_equipo_persona'=>'required',
            'miembro_equipo_rol'=>'required',
            'desde'=>'required',
            'hasta'=>'required',
           'fecha_estado'=>'required',
            'informe_id'=>'required',
            'actividades_planificadas'=>'required',
            'check_realizada'=>'required',
            'check_noRealizada'=>'required',
            'id_actividad_no_realizada'=>'required',
            'actividad_no_realizada'=>'required',
            'causa_actividad_no_realizada'=>'required',
            'id_actividad_no_planificada'=>'required',
            'actividad_mo_planificada'=>'required',
            'causa_actividad_no_planificada'=>'required',
            'fondos_planificados'=>'required',
            'fondos_consumidos'=>'required',
            'fondos_causa_desviacion'=>'required',
            'nivel_cumplidos'=>'required',
            'nivel_NoCumplidos'=>'required',
            'nivel_causas_desviacion'=>'required',
            'id_acciones_preventinas'=>'required',
            'acciones_preventinas_a_realizar'=>'required',
            'periodo_desde'=>'required',
            'periodo_hasta'=>'required',
            'proxima_fecha_revision'=>'required',
            'id_acciones_planificadas'=>'required',
            'acciones_planificadas'=>'required',
            'fondos_y_presupuesto'=>'required',
            'nuevos_riesgos'=>'required',
            'problemas_y_dificultades'=>'required',
            'otros_comentarios'=>'required' 
          
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $teamDevelopment->miembro_equipo_persona = $request->miembro_equipo_persona;
        $teamDevelopment->miembro_equipo_rol = $request->miembro_equipo_rol;
        $teamDevelopment->desde = $request->desde;
        $teamDevelopment->hasta = $request->hasta;
       $teamDevelopment->fecha_estado = $request->fecha_estado;
        $teamDevelopment->informe_id = $request->informe_id;
        $teamDevelopment->actividades_planificadas = $request->actividades_planificadas;
        $teamDevelopment->check_realizada = $request->check_realizada;
        $teamDevelopment->check_noRealizada = $request->check_noRealizada;
        
        $teamDevelopment->id_actividad_no_realizada = $request->id_actividad_no_realizada;
        $teamDevelopment->actividad_no_realizada = $request->actividad_no_realizada;
        $teamDevelopment->causa_actividad_no_realizada = $request->causa_actividad_no_realizada;
        $teamDevelopment->id_actividad_no_planificada = $request->id_actividad_no_planificada;
        
        $teamDevelopment->actividad_mo_planificada = $request->actividad_mo_planificada;
        $teamDevelopment->causa_actividad_no_planificada = $request->causa_actividad_no_planificada;
        $teamDevelopment->fondos_planificados = $request->fondos_planificados;
        $teamDevelopment->fondos_consumidos = $request->fondos_consumidos;
        
        $teamDevelopment->fondos_causa_desviacion = $request->fondos_causa_desviacion;
        $teamDevelopment->nivel_cumplidos = $request->nivel_cumplidos;
        $teamDevelopment->nivel_NoCumplidos = $request->nivel_NoCumplidos;
        $teamDevelopment->nivel_causas_desviacion = $request->nivel_causas_desviacion;
        
        $teamDevelopment->id_acciones_preventinas = $request->id_acciones_preventinas;
        $teamDevelopment->acciones_preventinas_a_realizar = $request->acciones_preventinas_a_realizar;
        $teamDevelopment->periodo_desde = $request->periodo_desde;
        $teamDevelopment->periodo_hasta = $request->periodo_hasta;
        $teamDevelopment->proxima_fecha_revision = $request->proxima_fecha_revision;
        $teamDevelopment->id_acciones_planificadas = $request->id_acciones_planificadas;
        $teamDevelopment->acciones_planificadas = $request->acciones_planificadas;
        $teamDevelopment->fondos_y_presupuesto = $request->fondos_y_presupuesto;
        $teamDevelopment->nuevos_riesgos = $request->nuevos_riesgos;
        $teamDevelopment->problemas_y_dificultades = $request->problemas_y_dificultades;
        $teamDevelopment->otros_comentarios = $request->otros_comentarios;
        
        $teamDevelopment->save();
        return response()->json($teamDevelopment);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamDevelopment  $teamDevelopment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamDevelopment $teamDevelopment)
    {
        $teamDevelopment->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
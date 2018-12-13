<?php
namespace App\Http\Controllers;
use Validator;
use App\ActaRiesgo;
use App\Project;
use Illuminate\Http\Request;
class ActaRiesgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ActaRiesgo::all());
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
            'edicion_previa'=>'required',
            'edicion_revisada'=>'required',
            
            'fecha_edicion_previa'=>'required',
            'fecha_revision'=>'required',
            'descripcion_del_proceso'=>'required',
            'herramientas_tecnicas_identificacion'=>'required',
            'tarea_trabajo_actividad'=>'required',
            'responsable'=>'required',
            
            'stakeholder'=>'required',
            'tiempo'=>'required',
            'calidad'=>'required',
            'coste'=>'required',
            'otro'=>'required',
            'tipo_riesgo'=>'required',
            'descripcion_causas_fuentes'=>'required',
            
            'descripcion_casiCierto'=>'required',
            'descripcion_probable'=>'required',
            'descripcion_posible'=>'required',
            'descripcion_pocoProbable'=>'required',
            'descripcion_raro'=>'required',
            
            
            'matriz_riesgo_00'=>'required',
            'matriz_riesgo_01'=>'required',
            'matriz_riesgo_02'=>'required',
            'matriz_riesgo_03'=>'required',
            'matriz_riesgo_04'=>'required',
            'matriz_riesgo_05'=>'required',
            
            'matriz_riesgo_10'=>'required',
            'matriz_riesgo_11'=>'required',
            'matriz_riesgo_12'=>'required',
            'matriz_riesgo_13'=>'required',
            'matriz_riesgo_14'=>'required',
            'matriz_riesgo_15'=>'required',
            
            'matriz_riesgo_20'=>'required',
            'matriz_riesgo_21'=>'required',
            'matriz_riesgo_22'=>'required',
            'matriz_riesgo_23'=>'required',
            'matriz_riesgo_24'=>'required',
            'matriz_riesgo_25'=>'required',
            
            'matriz_riesgo_30'=>'required',
            'matriz_riesgo_31'=>'required',
            'matriz_riesgo_32'=>'required',
            'matriz_riesgo_33'=>'required',
            'matriz_riesgo_34'=>'required',
            'matriz_riesgo_35'=>'required',
            
            'matriz_riesgo_40'=>'required',
            'matriz_riesgo_41'=>'required',
            'matriz_riesgo_42'=>'required',
            'matriz_riesgo_43'=>'required',
            'matriz_riesgo_44'=>'required',
            'matriz_riesgo_45'=>'required',
            
            
            'matriz_riesgo_50'=>'required',
            'matriz_riesgo_51'=>'required',
            'matriz_riesgo_52'=>'required',
            'matriz_riesgo_53'=>'required',
            'matriz_riesgo_54'=>'required',
            'matriz_riesgo_55'=>'required',
            
            
            'presupuesto_gestion_riesgo'=>'required',
            'protocolo_contigencia'=>'required',
            'protocolo_control_riesgo'=>'required',
            'protocolo_comunicacion_riesgos'=>'required',
            'protocolo_auditoria_planRiesgo'=>'required' 
                                            ]);
                           if ($validator->fails()) {
                          return response()->json(['Error'],404);
                                    }else{
$project=Project::findOrFail($project_id);
if (!$project) {
    return response()->json(['No existe proyecto'],404);
}else{
    $actaRiesgo = $project->actaRiesgo;
    if ($actaRiesgo) {
        return response()->json(['ya tiene acta de riesgo este proyecto'],404);
    } else {
        $actaRiesgo = new ActaRiesgo([
        
            'edicion_previa'=>$request->input('edicion_previa'),
            'edicion_revisada'=>$request->input('edicion_revisada'),
            
            'fecha_edicion_previa'=>$request->input('fecha_edicion_previa'),
            'fecha_revision'=>$request->input('fecha_revision'),
            'descripcion_del_proceso'=>$request->input('descripcion_del_proceso'),
            'herramientas_tecnicas_identificacion'=>$request->input('herramientas_tecnicas_identificacion'),
            'tarea_trabajo_actividad'=>$request->input('tarea_trabajo_actividad'),
            'responsable'=>$request->input('responsable'),
            
            'stakeholder'=>$request->input('stakeholder'),
            'tiempo'=>$request->input('tiempo'),
            'calidad'=>$request->input('calidad'),
            'coste'=>$request->input('coste'),
            'otro'=>$request->input('otro'),
            'tipo_riesgo'=>$request->input('tipo_riesgo'),
            'descripcion_causas_fuentes'=>$request->input('descripcion_causas_fuentes'),
            
            'descripcion_casiCierto'=>$request->input('descripcion_casiCierto'),
            'descripcion_probable'=>$request->input('descripcion_probable'),
            'descripcion_posible'=>$request->input('descripcion_posible'),
            'descripcion_pocoProbable'=>$request->input('descripcion_pocoProbable'),
            'descripcion_raro'=>$request->input('descripcion_raro'),
            
            
            'matriz_riesgo_00'=>$request->input('matriz_riesgo_00'),
            'matriz_riesgo_01'=>$request->input('matriz_riesgo_01'),
            'matriz_riesgo_02'=>$request->input('matriz_riesgo_02'),
            'matriz_riesgo_03'=>$request->input('matriz_riesgo_03'),
            'matriz_riesgo_04'=>$request->input('matriz_riesgo_04'),
            'matriz_riesgo_05'=>$request->input('matriz_riesgo_05'),
            
            'matriz_riesgo_10'=>$request->input('matriz_riesgo_10'),
            'matriz_riesgo_11'=>$request->input('matriz_riesgo_11'),
            'matriz_riesgo_12'=>$request->input('matriz_riesgo_12'),
            'matriz_riesgo_13'=>$request->input('matriz_riesgo_13'),
            'matriz_riesgo_14'=>$request->input('matriz_riesgo_14'),
            'matriz_riesgo_15'=>$request->input('matriz_riesgo_15'),
            
            'matriz_riesgo_20'=>$request->input('matriz_riesgo_20'),
            'matriz_riesgo_21'=>$request->input('matriz_riesgo_21'),
            'matriz_riesgo_22'=>$request->input('matriz_riesgo_22'),
            'matriz_riesgo_23'=>$request->input('matriz_riesgo_23'),
            'matriz_riesgo_24'=>$request->input('matriz_riesgo_24'),
            'matriz_riesgo_25'=>$request->input('matriz_riesgo_25'),
            
            'matriz_riesgo_30'=>$request->input('matriz_riesgo_30'),
            'matriz_riesgo_31'=>$request->input('matriz_riesgo_31'),
            'matriz_riesgo_32'=>$request->input('matriz_riesgo_32'),
            'matriz_riesgo_33'=>$request->input('matriz_riesgo_33'),
            'matriz_riesgo_34'=>$request->input('matriz_riesgo_34'),
            'matriz_riesgo_35'=>$request->input('matriz_riesgo_35'),
            
            'matriz_riesgo_40'=>$request->input('matriz_riesgo_40'),
            'matriz_riesgo_41'=>$request->input('matriz_riesgo_41'),
            'matriz_riesgo_42'=>$request->input('matriz_riesgo_42'),
            'matriz_riesgo_43'=>$request->input('matriz_riesgo_43'),
            'matriz_riesgo_44'=>$request->input('matriz_riesgo_44'),
            'matriz_riesgo_45'=>$request->input('matriz_riesgo_45'),
            
            
            'matriz_riesgo_50'=>$request->input('matriz_riesgo_50'),
            'matriz_riesgo_51'=>$request->input('matriz_riesgo_51'),
            'matriz_riesgo_52'=>$request->input('matriz_riesgo_52'),
            'matriz_riesgo_53'=>$request->input('matriz_riesgo_53'),
            'matriz_riesgo_54'=>$request->input('matriz_riesgo_54'),
            'matriz_riesgo_55'=>$request->input('matriz_riesgo_55'),
            
            
            'presupuesto_gestion_riesgo'=>$request->input('presupuesto_gestion_riesgo'),
            'protocolo_contigencia'=>$request->input('protocolo_contigencia'),
            'protocolo_control_riesgo'=>$request->input('protocolo_control_riesgo'),
            'protocolo_comunicacion_riesgos'=>$request->input('protocolo_comunicacion_riesgos'),
            'protocolo_auditoria_planRiesgo'=>$request->input('protocolo_auditoria_planRiesgo'),
            'project_id'=>$project_id
        ]);
        $actaRiesgo->save();
        return response()->json($actaRiesgo);
        }
    }
}
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ActaRiesgo  $actaRiesgo
     * @return \Illuminate\Http\Response
     */
    public function show(ActaRiesgo $actaRiesgo)
    {
        return response()->json($actaRiesgo);
    } 
       
    public function listaActaRiesgoPorProyecto($project_id){
        $project =Project::find($project_id);
       
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $actaRiesgo = $project->actaRiesgo;
        return response()->json(['Acta de Riesgo del proyecto'=>$actaRiesgo],202);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaRiesgo  $actaRiesgo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaRiesgo $actaRiesgo)
    {
        $validator = Validator::make($request->all(),[
            'edicion_previa'=>'required',
            'edicion_revisada'=>'required',
            
            'fecha_edicion_previa'=>'required',
           'fecha_revision'=>'required',
            'descripcion_del_proceso'=>'required',
            'herramientas_tecnicas_identificacion'=>'required',
            'tarea_trabajo_actividad'=>'required',
            'responsable'=>'required',
            
            'stakeholder'=>'required',
            'tiempo'=>'required',
            'calidad'=>'required',
            'coste'=>'required',
            'otro'=>'required',
            'tipo_riesgo'=>'required',
            'descripcion_causas_fuentes'=>'required',
            
            'descripcion_casiCierto'=>'required',
            'descripcion_probable'=>'required',
            'descripcion_posible'=>'required',
            'descripcion_pocoProbable'=>'required',
            'descripcion_raro'=>'required',
            
            
            'matriz_riesgo_00'=>'required',
            'matriz_riesgo_01'=>'required',
            'matriz_riesgo_02'=>'required',
            'matriz_riesgo_03'=>'required',
            'matriz_riesgo_04'=>'required',
            'matriz_riesgo_05'=>'required',
            
            'matriz_riesgo_10'=>'required',
            'matriz_riesgo_11'=>'required',
            'matriz_riesgo_12'=>'required',
            'matriz_riesgo_13'=>'required',
            'matriz_riesgo_14'=>'required',
            'matriz_riesgo_15'=>'required',
            
            'matriz_riesgo_20'=>'required',
            'matriz_riesgo_21'=>'required',
            'matriz_riesgo_22'=>'required',
            'matriz_riesgo_23'=>'required',
            'matriz_riesgo_24'=>'required',
            'matriz_riesgo_25'=>'required',
            
            'matriz_riesgo_30'=>'required',
            'matriz_riesgo_31'=>'required',
            'matriz_riesgo_32'=>'required',
            'matriz_riesgo_33'=>'required',
            'matriz_riesgo_34'=>'required',
            'matriz_riesgo_35'=>'required',
            
            'matriz_riesgo_40'=>'required',
            'matriz_riesgo_41'=>'required',
            'matriz_riesgo_42'=>'required',
            'matriz_riesgo_43'=>'required',
            'matriz_riesgo_44'=>'required',
            'matriz_riesgo_45'=>'required',
            
            
            'matriz_riesgo_50'=>'required',
            'matriz_riesgo_51'=>'required',
            'matriz_riesgo_52'=>'required',
            'matriz_riesgo_53'=>'required',
            'matriz_riesgo_54'=>'required',
            'matriz_riesgo_55'=>'required',
            
            
            'presupuesto_gestion_riesgo'=>'required',
            'protocolo_contigencia'=>'required',
            'protocolo_control_riesgo'=>'required',
            'protocolo_comunicacion_riesgos'=>'required',
            'protocolo_auditoria_planRiesgo'=>'required'
                    
                ]);
                if ($validator->fails()) {
                    return response()->json(['Error'],404);
        
                }else{
                $actaRiesgo->edicion_previa = $request->edicion_previa;
                $actaRiesgo->edicion_revisada = $request->edicion_revisada;
                $actaRiesgo->fecha_edicion_previa = $request->fecha_edicion_previa;
               $actaRiesgo->fecha_revision = $request->fecha_revision;
                $actaRiesgo->descripcion_del_proceso = $request->descripcion_del_proceso;
                $actaRiesgo->herramientas_tecnicas_identificacion = $request->herramientas_tecnicas_identificacion;
                $actaRiesgo->tarea_trabajo_actividad = $request->tarea_trabajo_actividad;
                $actaRiesgo->responsable = $request->responsable;
                
                $actaRiesgo->stakeholder = $request->stakeholder;
                $actaRiesgo->tiempo = $request->tiempo;
                $actaRiesgo->calidad = $request->calidad;
                $actaRiesgo->coste = $request->coste;
                $actaRiesgo->otro = $request->otro;
                $actaRiesgo->tipo_riesgo = $request->tipo_riesgo;
                
                $actaRiesgo->descripcion_causas_fuentes = $request->descripcion_causas_fuentes;
                $actaRiesgo->descripcion_casiCierto = $request->descripcion_casiCierto;
                $actaRiesgo->descripcion_probable = $request->descripcion_probable;
                $actaRiesgo->descripcion_posible = $request->descripcion_posible;
                $actaRiesgo->descripcion_pocoProbable = $request->descripcion_pocoProbable;
                $actaRiesgo->descripcion_raro = $request->descripcion_raro;
                
                $actaRiesgo->matriz_riesgo_00 = $request->matriz_riesgo_00;
                $actaRiesgo->matriz_riesgo_01 = $request->matriz_riesgo_01;
                $actaRiesgo->matriz_riesgo_02 = $request->matriz_riesgo_02;
                $actaRiesgo->matriz_riesgo_03 = $request->matriz_riesgo_03;
                $actaRiesgo->matriz_riesgo_04 = $request->matriz_riesgo_04;
                $actaRiesgo->matriz_riesgo_05 = $request->matriz_riesgo_05;
                
                $actaRiesgo->matriz_riesgo_10 = $request->matriz_riesgo_10;
                $actaRiesgo->matriz_riesgo_11 = $request->matriz_riesgo_11;
                $actaRiesgo->matriz_riesgo_12 = $request->matriz_riesgo_12;
                $actaRiesgo->matriz_riesgo_13 = $request->matriz_riesgo_13;
                $actaRiesgo->matriz_riesgo_14 = $request->matriz_riesgo_14;
                $actaRiesgo->matriz_riesgo_15 = $request->matriz_riesgo_15;
                
                $actaRiesgo->matriz_riesgo_20 = $request->matriz_riesgo_20;
                $actaRiesgo->matriz_riesgo_21 = $request->matriz_riesgo_21;
                $actaRiesgo->matriz_riesgo_22 = $request->matriz_riesgo_22;
                $actaRiesgo->matriz_riesgo_23 = $request->matriz_riesgo_23;
                $actaRiesgo->matriz_riesgo_24 = $request->matriz_riesgo_24;
                $actaRiesgo->matriz_riesgo_25 = $request->matriz_riesgo_25;
                $actaRiesgo->matriz_riesgo_30 = $request->matriz_riesgo_30;
                $actaRiesgo->matriz_riesgo_31 = $request->matriz_riesgo_31;
                $actaRiesgo->matriz_riesgo_32 = $request->matriz_riesgo_32;
                $actaRiesgo->matriz_riesgo_33 = $request->matriz_riesgo_33;
                $actaRiesgo->matriz_riesgo_34 = $request->matriz_riesgo_34;
                $actaRiesgo->matriz_riesgo_35 = $request->matriz_riesgo_35;
                $actaRiesgo->matriz_riesgo_40 = $request->matriz_riesgo_40;
                $actaRiesgo->matriz_riesgo_41 = $request->matriz_riesgo_41;
                $actaRiesgo->matriz_riesgo_42 = $request->matriz_riesgo_42;
                $actaRiesgo->matriz_riesgo_43 = $request->matriz_riesgo_43;
                $actaRiesgo->matriz_riesgo_44 = $request->matriz_riesgo_44;
                $actaRiesgo->matriz_riesgo_45 = $request->matriz_riesgo_45;
             
                $actaRiesgo->matriz_riesgo_50 = $request->matriz_riesgo_50;
                $actaRiesgo->matriz_riesgo_51 = $request->matriz_riesgo_51;
                $actaRiesgo->matriz_riesgo_52 = $request->matriz_riesgo_52;
                $actaRiesgo->matriz_riesgo_53 = $request->matriz_riesgo_53;
                $actaRiesgo->matriz_riesgo_54 = $request->matriz_riesgo_54;
                $actaRiesgo->matriz_riesgo_55 = $request->matriz_riesgo_55;
                $actaRiesgo->presupuesto_gestion_riesgo = $request->presupuesto_gestion_riesgo;
                $actaRiesgo->protocolo_contigencia = $request->protocolo_contigencia;
                $actaRiesgo->protocolo_control_riesgo = $request->protocolo_control_riesgo;
                $actaRiesgo->protocolo_comunicacion_riesgos = $request->protocolo_comunicacion_riesgos;
                $actaRiesgo->protocolo_auditoria_planRiesgo = $request->protocolo_auditoria_planRiesgo;
        
                $actaRiesgo->save();
                return response()->json($actaRiesgo);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActaRiesgo  $actaRiesgo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActaRiesgo $actaRiesgo)
    {
        $actaRiesgo->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
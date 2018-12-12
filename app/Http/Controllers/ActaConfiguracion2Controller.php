<?php
namespace App\Http\Controllers;
use Validator;
use App\ActaConfiguracion2;
use App\ Project;
use Illuminate\Http\Request;
class ActaConfiguracion2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ActaConfiguracion2::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        $validator = Validator::make($request->all(),[
            
            'objetivos_y_alcance'=> 'required',
            'rol_a_desempeñar'=> 'required',
         /*   'funciones_y_responsabilidades'=> 'required',
            
            'elemento_entregables'=> 'required',
            'normas_identificacion_elementos'=> 'required',
            'responsable_elementos'=> 'required',
            
            'documento'=> 'required',
            'norma_identificacion_documento'=> 'required',
            'responsable_documento'=> 'required',
            
            'sistema_procedimiento'=> 'required',
            'codigo_documento'=> 'required',
            'fecha_aprobacion'=> 'required',
            'procedimiento_comunicacion'=> 'required',
            'procedimiento_y_niveles_de_aprobacion'=> 'required',
            'procedimiento_de_auditoria_en_la_gestion'=> 'required',
            'documento_lineaBase'=> 'required',
            'descripcion_resumen'=> 'required'*/
           
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $project=Project::findOrFail($project_id);
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
                $actaConfiguracion2 = $project->actaConfiguracion2;
                if ($actaConfiguracion2) {
                    return response()->json(['ya tiene plan este proyecto'],404);
                } else {
                $actaConfiguracion2 = new ActaConfiguracion2([
                    
                    'objetivos_y_alcance'=>$request->input('objetivos_y_alcance'),
                    'rol_a_desempeñar'=>$request->input('rol_a_desempeñar'),
             /*       'funciones_y_responsabilidades'=>$request->input('funciones_y_responsabilidades'),
                    
                    'elemento_entregables'=>$request->input('elemento_entregables'),
                    'normas_identificacion_elementos'=>$request->input('normas_identificacion_elementos'),
                    'responsable_elementos'=>$request->input('responsable_elementos'),
                    
                    'documento'=>$request->input('documento'),
                    'norma_identificacion_documento'=>$request->input('norma_identificacion_documento'),
                    'responsable_documento'=>$request->input('responsable_documento'),
                    
                    'sistema_procedimiento'=>$request->input('sistema_procedimiento'),
                    'codigo_documento'=>$request->input('codigo_documento'),
                    'fecha_aprobacion'=>$request->input('fecha_aprobacion'),
                    'procedimiento_comunicacion'=>$request->input('procedimiento_comunicacion'),
                    'procedimiento_y_niveles_de_aprobacion'=>$request->input('procedimiento_y_niveles_de_aprobacion'),
                    'procedimiento_de_auditoria_en_la_gestion'=>$request->input('procedimiento_de_auditoria_en_la_gestion'),
                    'documento_lineaBase'=>$request->input('documento_lineaBase'),
                    'descripcion_resumen'=>$request->input('descripcion_resumen'), */
                    'project_id'=>$project_id
                ]);
                $actaConfiguracion2->save();
                return response()->json($actaConfiguracion2);
        
                }
            }
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function show(ActaConfiguracion2 $actaConfiguracion2)
    {
        return response()->json($actaConfiguracion2);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaConfiguracion2 $actaConfiguracion2)
    {
        $validator = Validator::make($request->all(),[
            'objetivos_y_alcance'=> 'required',
            'rol_a_desempeñar'=> 'required',
         /*   'funciones_y_responsabilidades'=> 'required',
            
            'elemento_entregables'=> 'required',
            'normas_identificacion_elementos'=> 'required',
            'responsable_elementos'=> 'required',
            
            'documento'=> 'required',
            'norma_identificacion_documento'=> 'required',
            'responsable_documento'=> 'required',
            
            'sistema_procedimiento'=> 'required',
            'codigo_documento'=> 'required',
            'fecha_aprobacion'=> 'required',
            'procedimiento_comunicacion'=> 'required',
            'procedimiento_y_niveles_de_aprobacion'=> 'required',
            'procedimiento_de_auditoria_en_la_gestion'=> 'required',
            'documento_lineaBase'=> 'required',
            'descripcion_resumen'=> 'required'
           */
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $actaConfiguracion2->objetivos_y_alcance = $request->objetivos_y_alcance;
        $actaConfiguracion2->rol_a_desempeñar = $request->rol_a_desempeñar;
     /*   $actaConfiguracion2->funciones_y_responsabilidades = $request->funciones_y_responsabilidades;
        $actaConfiguracion2 ->elemento_entregables =$request->elemento_entregables;
        $actaConfiguracion2 ->normas_identificacion_elementos =$request->normas_identificacion_elementos;
        $actaConfiguracion2 ->responsable_elementos =$request->responsable_elementos;
        $actaConfiguracion2 ->documento =$request->documento;
        $actaConfiguracion2 ->norma_identificacion_documento =$request->norma_identificacion_documento;
        $actaConfiguracion2 ->responsable_documento =$request->responsable_documento;
        $actaConfiguracion2 ->sistema_procedimiento =$request->sistema_procedimiento;
        $actaConfiguracion2 ->codigo_documento =$request->codigo_documento;
        $actaConfiguracion2 ->fecha_aprobacion =$request->fecha_aprobacion;
        $actaConfiguracion2 ->procedimiento_comunicacion =$request->procedimiento_comunicacion;
        $actaConfiguracion2 ->procedimiento_y_niveles_de_aprobacion =$request->procedimiento_y_niveles_de_aprobacion;
        $actaConfiguracion2 ->procedimiento_de_auditoria_en_la_gestion =$request->procedimiento_de_auditoria_en_la_gestion;
        $actaConfiguracion2 ->documento_lineaBase =$request->documento_lineaBase;
        $actaConfiguracion2 ->descripcion_resumen =$request->descripcion_resumen; */
        
        $actaConfiguracion2->save();
        return response()->json($actaConfiguracion2);
    }
    }
    
    public function listaActaConfiguracionPorProyecto($project_id){
        $project =Project::find($project_id);
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $actaConfiguracion2 = $project->actaConfiguracion2;
        return response()->json(['Plan del proyecto'=>$actaConfiguracion2],202);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActaConfiguracion2 $actaConfiguracion2)
    {
        $actaConfiguracion2->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
    
    public function completed(Project_team $project_team , PlanProject $planProject){
        if($planProject->completed==false){
    
            $planProject->completed = true;
            $planProject->update(['completed'=> $planProject->completed]);
    
        }else{
            $planProject->completed = false;
            $planProject->update(['completed'=> $planProject->completed]);
        }
    
       }
}
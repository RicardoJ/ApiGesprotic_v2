<?php
namespace App\Http\Controllers;
use Validator;
use App\ActaConstitucion;
use App\Project;
use Illuminate\Support\Facades\DB;
use App\Limitaciones_de_partida;
use App\fases_de_proyectos;
use App\Riesgos_iniciales_identificados;
use App\Otros_requisitos_de_proyecto;

use Illuminate\Http\Request;
class ActaConstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actaConstitucions = ActaConstitucion::all();
        $save = array();
        foreach ($actaConstitucions as $actaConstitucion) {
            
             $limitacionesPartida = Limitaciones_de_partida::where('actaConstitucion_id', $actaConstitucion['id'])->get();
             $faseProyecto =  fases_de_proyectos::where('actaConstitucion_id', $actaConstitucion['id'])->get();
             $riesgosIniciales = Riesgos_iniciales_identificados::where('actaConstitucion_id', $actaConstitucion['id'])->get();
             $otrosrequisitos = Otros_requisitos_de_proyecto::where('actaConstitucion_id', $actaConstitucion['id'])->get();
 
                $actaConstitucion->limitaciones_de_partida = $limitacionesPartida;
                $actaConstitucion->fases_de_proyectos = $faseProyecto;
                $actaConstitucion->riesgos_iniciales_identificados = $riesgosIniciales;
                $actaConstitucion->otros_requisitos_de_proyecto = $otrosrequisitos;

              array_push($save,$actaConstitucion);  
        }
        
      
        return response()->json(['acta de constitucion',$save],200);



   
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        try{
            $error = null;
         DB::beginTransaction();
        $validator = Validator::make($request->all(),[
                            
                            'cliente_peticionario' => 'required',
                            'responsable_de_cliente' => 'required', 
                            'fecha' => 'required',
                            'sponsor_nombre' => 'required',
                            'sponsor_departamento' => 'required',
                            'justificacion_del_proyecto' => 'required',
                            'descripcion_del_proyecto' => 'required',
                            'analisis_previo_de_viabilidad'=> 'required',
                            'requisitos_generales_del_proyecto'=> 'required',
                            'alcances_objetivos_del_proyecto'=> 'required',
                            'alcances_criterios_de_aceptacion'=> 'required',
                            'alcances_aprobacion_persona' => 'required',
                            'alcances_aprobacion_departamento'=> 'required',
                            'tiempo_objetivos_del_proyecto'=> 'required',
                            
                            'tiempo_criterios_de_aceptacion'=> 'required',
                            'tiempo_aprobacion_persona'=> 'required',
                            'tiempo_aprobacion_departamento'=> 'required',
                            'presupuesto_objetivos'=> 'required',
                            'presupuesto_criterios_de_aceptacion'=> 'required',
                            'presupuesto_aprobacion_persona'=> 'required',
                            'presupuesto_aprovacion_departamento'=> 'required',
                            'calidad_objetivos'=> 'required',
                            'calidad_criterios_de_aceptacion'=> 'required',
                            'calidad_aprobacion_persona'=> 'required',
                            'calidad_aprobacion_departamento'=> 'required',
                            'otros_aprobacion_departamento'=> 'required',
                            'otros_objetivos'=> 'required',
                            'otros_criterios_de_aceptacion'=> 'required',
                            'otros_aprobacion_persona'=> 'required',
                            'departamentos_implicados_y_recursos_preasignados'=> 'required',
                            'factores_criticos_de_exito'=> 'required',
                            'limitaciones_de_partida'=>'required|array|min:1',
                            'fases_de_proyectos'=>'required|array|min:1',
                            'riesgos_iniciales_identificados'=>'required|array|min:1',
                            'otros_requisitos_de_proyecto' =>'required|array|min:1'
                           
                           
        ]);
        if ($validator->fails()) {
            $errors=$validator->messages();
            return response()->json(['Error' => $errors],404);
        }else{
        $project=Project::findOrFail($project_id);
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
                $actaConstitucion = $project->actaConstitucion;
                if ($actaConstitucion) {
                    return response()->json(['ya tiene acta de constitucion  este proyecto'],404);
                } else {
                $data1=[
        'cliente_peticionario' =>$request->input('cliente_peticionario'),
        'responsable_de_cliente' =>$request->input('responsable_de_cliente'), 
        'fecha' =>$request->input('fecha'),
        'sponsor_nombre' =>$request->input('sponsor_nombre'),
        'sponsor_departamento' =>$request->input('sponsor_departamento'),
        'justificacion_del_proyecto' =>$request->input('justificacion_del_proyecto'),
        'descripcion_del_proyecto' =>$request->input('descripcion_del_proyecto'),
        'analisis_previo_de_viabilidad'=>$request->input('analisis_previo_de_viabilidad'),
        'requisitos_generales_del_proyecto'=>$request->input('requisitos_generales_del_proyecto'),
        'alcances_objetivos_del_proyecto'=>$request->input('alcances_objetivos_del_proyecto'),
        'alcances_criterios_de_aceptacion'=>$request->input('alcances_criterios_de_aceptacion'),
        'alcances_aprobacion_persona' =>$request->input('alcances_aprobacion_persona'),
        'alcances_aprobacion_departamento'=>$request->input('alcances_aprobacion_departamento'),
        'tiempo_objetivos_del_proyecto'=>$request->input('tiempo_objetivos_del_proyecto'),
        
        'tiempo_criterios_de_aceptacion'=>$request->input('tiempo_criterios_de_aceptacion'),
        'tiempo_aprobacion_persona'=>$request->input('tiempo_aprobacion_persona'),
        'tiempo_aprobacion_departamento'=>$request->input('tiempo_aprobacion_departamento'),
        'presupuesto_objetivos'=>$request->input('presupuesto_objetivos'),
        'presupuesto_criterios_de_aceptacion'=>$request->input('presupuesto_criterios_de_aceptacion'),
        'presupuesto_aprobacion_persona'=>$request->input('presupuesto_aprobacion_persona'),
        'presupuesto_aprovacion_departamento'=>$request->input('presupuesto_aprovacion_departamento'),
        'calidad_objetivos'=>$request->input('calidad_objetivos'),
        'calidad_criterios_de_aceptacion'=>$request->input('calidad_criterios_de_aceptacion'),
        'calidad_aprobacion_persona'=>$request->input('calidad_aprobacion_persona'),
        'calidad_aprobacion_departamento'=>$request->input('calidad_aprobacion_departamento'),
        'otros_aprobacion_departamento'=>$request->input('otros_aprobacion_departamento'),
        'otros_objetivos'=>$request->input('otros_objetivos'),
        'otros_criterios_de_aceptacion'=>$request->input('otros_criterios_de_aceptacion'),
        'otros_aprobacion_persona'=>$request->input('otros_aprobacion_persona'),
        'departamentos_implicados_y_recursos_preasignados'=>$request->input('departamentos_implicados_y_recursos_preasignados'),
        'factores_criticos_de_exito'=>$request->input('factores_criticos_de_exito'),
                            
                    
                   
                    'project_id'=>$project_id
                ];
                $result = ActaConstitucion::create($data1);
                /////////////
            $limitacionesPartidas = $request->input('limitaciones_de_partida');
            $save = array();
             foreach ($limitacionesPartidas as $value) {
                
                   
                $data = [
                    'actaConstitucion_id' => $result->id,
                    'nombre'=>$value['nombre'],
                    'afecta_a'=>$value['afecta_a'],
                    'valoracion'=>$value['valoracion'],
                ];
    
                $limitacionPartida =  Limitaciones_de_partida::create($data);
          
            array_push($save, $limitacionPartida);
     
                       
            }       
            $result->limitacionesDePartida = $save;
///////   Fases de proyectos
$fases = $request->input('fases_de_proyectos');
$save = array();
 foreach ($fases as $value) {
 
    $dataFase = [
        'actaConstitucion_id' => $result->id,
        'fecha_de_inicio'=>$value['fecha_de_inicio'],
        'fecha_fin'=>$value['fecha_fin'],
        'nombre_de_hito'=>$value['nombre_de_hito'],
        'entregable_principal'=>$value['entregable_principal'],
        'fecha_hito'=>$value['fecha_hito']
    ];
 $fase =  fases_de_proyectos::create($dataFase);
 array_push($save, $fase);

 }
   
    $result->fases = $save; 
    ////riesgos iniciales
    $riesgosIniciales = $request->input('riesgos_iniciales_identificados');
    $save = array();
     foreach ($riesgosIniciales as $value) {
     
        $dataRiesgos = [
            'actaConstitucion_id' => $result->id,
            'nombre'=>$value['nombre'],
            'probabilidad'=>$value['probabilidad'],
            'impacta_sobre'=>$value['impacta_sobre'],
            'valoracion'=>$value['valoracion']
           
        ];
     $riesgosInicial =  Riesgos_iniciales_identificados::create($dataRiesgos);
     array_push($save, $riesgosInicial);
    
     }
       
        $result->riesgos_iniciales_identificados = $save; 


    //////otros requisitos
    $otrosrequisitos = $request->input('otros_requisitos_de_proyecto');
    $save = array();
     foreach ($otrosrequisitos as $value) {
     
        $dataOtroReq = [
            'actaConstitucion_id' => $result->id,
            'nombre'=>$value['nombre'],
            'cargo_departamento'=>$value['cargo_departamento'],
            
           
        ];
     $otrorequisito =  Otros_requisitos_de_proyecto::create($dataOtroReq);
     array_push($save, $otrorequisito);
    
     }
       
        $result->riesgos_iniciales_identificados = $save; 
    /////////////

DB::commit();
return response()->json(['Guardado',$result],200);
           
           
            }
      
        }
       
    }
} catch (\Exception $e) {
           
    $error = $e->getMessage();
    DB::rollback();
    return response()->json(['Error , falta campos por llenar' => $error],404);
    
    }
}
   
    /**
     * Display the specified resource.
     *
     * @param  \App\ActaConstitucion  $actaConstitucion
     * @return \Illuminate\Http\Response
     */
    public function show(ActaConstitucion $actaConstitucion)
    {
        $l = Limitaciones_de_partida::where('actaConstitucion_id', $actaConstitucion['id'])->get();
        $f =  fases_de_proyectos::where('actaConstitucion_id', $actaConstitucion['id'])->get();
        $riesgosIniciales = Riesgos_iniciales_identificados::where('actaConstitucion_id', $actaConstitucion['id'])->get();
        $otrosrequisitos = Otros_requisitos_de_proyecto::where('actaConstitucion_id', $actaConstitucion['id'])->get();
 
 
        $actaConstitucion->limitaciones_de_partida = $l;
        $actaConstitucion->fases_de_proyectos = $f;
        $actaConstitucion->riesgos_iniciales_identificados = $riesgosIniciales;
        $actaConstitucion->otros_requisitos_de_proyecto = $otrosrequisitos;
        return response()->json($actaConstitucion);


    }  

  
    public function listaActaConstitucionPorProyecto($project_id){
        $project =Project::find($project_id);
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $save = array();
        $actaConstitucion = $project->actaConstitucion;
      foreach ($actaConstitucion as $actaConst) {
            
        $limitacionesPartida = Limitaciones_de_partida::where('actaConstitucion_id', $actaConstitucion['id'])->get();
        $faseProyecto =  fases_de_proyectos::where('actaConstitucion_id', $actaConstitucion['id'])->get();
        $riesgosIniciales = Riesgos_iniciales_identificados::where('actaConstitucion_id', $actaConstitucion['id'])->get();
        $otrosrequisitos = Otros_requisitos_de_proyecto::where('actaConstitucion_id', $actaConstitucion['id'])->get();
 
           $actaConst->limitaciones_de_partida = $limitacionesPartida;
           $actaConst->fases_de_proyectos = $faseProyecto;
           $actaConst->riesgos_iniciales_identificados = $riesgosIniciales;
           $actaConst->otros_requisitos_de_proyecto = $otrosrequisitos;
        

         array_push($save,$actaConst);  
   }
       
        return response()->json(['Acta de Constitucion del proyecto'=>$save],202);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaConstitucion  $actaConstitucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaConstitucion $actaConstitucion)
    {
        $validator = Validator::make($request->all(),[
            'cliente_peticionario' => 'required',
            'responsable_de_cliente' => 'required', 
            'fecha' => 'required',
            'sponsor_nombre' => 'required',
            'sponsor_departamento' => 'required',
            'justificacion_del_proyecto' => 'required',
            'descripcion_del_proyecto' => 'required',
            'analisis_previo_de_viabilidad'=> 'required',
            'requisitos_generales_del_proyecto'=> 'required',
            'alcances_objetivos_del_proyecto'=> 'required',
            'alcances_criterios_de_aceptacion'=> 'required',
            'alcances_aprobacion_persona' => 'required',
            'alcances_aprobacion_departamento'=> 'required',
            'tiempo_objetivos_del_proyecto'=> 'required',
            
            'tiempo_criterios_de_aceptacion'=> 'required',
            'tiempo_aprobacion_persona'=> 'required',
            'tiempo_aprobacion_departamento'=> 'required',
            'presupuesto_objetivos'=> 'required',
            'presupuesto_criterios_de_aceptacion'=> 'required',
            'presupuesto_aprobacion_persona'=> 'required',
            'presupuesto_aprovacion_departamento'=> 'required',
            'calidad_objetivos'=> 'required',
            'calidad_criterios_de_aceptacion'=> 'required',
            'calidad_aprobacion_persona'=> 'required',
            'calidad_aprobacion_departamento'=> 'required',
            'otros_aprobacion_departamento'=> 'required',
            'otros_objetivos'=> 'required',
            'otros_criterios_de_aceptacion'=> 'required',
            'otros_aprobacion_persona'=> 'required',
            'departamentos_implicados_y_recursos_preasignados'=> 'required',
            'factores_criticos_de_exito'=> 'required',
        ]);
        if ($validator->fails()) {
            $errors=$validator->messages();
            return response()->json(['Error' => $errors],404);
        }else{
        $actaConstitucion->update($request->all());
        $actaConstitucion->save();
        return response()->json($actaConstitucion);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActaConstitucion  $actaConstitucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actaConstitucion = ActaConstitucion::find($id);
        $actaConstitucion->limitacionDePartida()->delete();
        $actaConstitucion->fasesDeProyectos()->delete();
        $actaConstitucion->riesgos_iniciales_identificados()->delete();
        $actaConstitucion->riesgos_iniciales_identificados()->delete();
        $actaConstitucion->otros_requisitos_de_proyecto()->delete();
        $actaConstitucion->delete();
        
        return response()->json(['success' => 'borrado correctamente']);



    }
}
<?php
namespace App\Http\Controllers;
use Validator;
use App\ActaConstitucion;
use App\Project;
use Illuminate\Support\Facades\DB;
use App\LimitacionesDePartida;

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
            
             $limitacionesPartida = LimitacionesDePartida::where('actaConstitucion_id', $actaConstitucion['id'])->get();
             //$e =  fase::where('lesson_learned_id', $actaConstitucions['id'])->get();
 
                $actaConstitucion->limitacionesDePartida = $limitacionesPartida;
               // $actaConstitucion->fase = $e;
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
                           
                           
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
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
                    'nombre'=>$value['afecta_a'],
                    'nombre'=>$value['valoracion'],
                ];
    
                $limitacionPartida =  LimitacionesDePartida::create($data);
          
            array_push($save, $limitacionPartida);
     
                       
            }       
            $result->limitacionesDePartida = $save;
////////////////////////////////////////

DB::commit();
return response()->json(['Guardado',$result],200);
           
           
            }
      
        }
       
    }
} catch (\Exception $e) {
           
    $error = $e->getMessage();
    DB::rollback();
    return response()->json(['Error , falta campos por llenar'],404);
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
        $l = LimitacionesDePartida::where('actaConstitucion_id', $actaConstitucion['id'])->get();

 
        $actaConstitucion->limitacionesDePartida = $l;
        
        return response()->json($actaConstitucion);


        return response()->json($actaConstitucion);
    }  

    //funcion obsoleta
    public function listaActaConstitucionPorProyecto($project_id){
        $project =Project::find($project_id);
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $actaConstitucion = $project->actaConstitucion;
        return response()->json(['Acta de Constitucion del proyecto'=>$actaConstitucion],202);
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
            return response()->json(['Error'],404);
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
      
        $actaConstitucion->delete();
        
        return response()->json(['success' => 'borrado correctamente']);



    }
}
<?php
namespace App\Http\Controllers;
use Validator;
use App\ActaConstitucion;
use App\Project;
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
        return response()->json(ActaConstitucion::all());
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
                            'fecha' => 'required',
                            'CLIENTE_PETICIONARIO' => 'required',
                            'persona_Rpble_Cliente' => 'required', 
                        /*    'departamento_cliente' => 'required',
                            'sponsor' => 'required',
                            'persona_sponsor' => 'required',
                            'departamento_sponsor' => 'required',
                            'director'=> 'required',
                            'persona_director'=> 'required',
                            'departamaneto_director'=> 'required',
                            'codigo_proyecto'=> 'required',
                            'check_pendienteAsignacion' => 'required',
                            'check_contrato'=> 'required',
                            'check_casoNegocio'=> 'required',
                            
                            'check_Enunciado'=> 'required',
                            'vision_estrategica'=> 'required',
                            'descripcion_del_proyecto'=> 'required',
                            'analisis_previo_viabilidad'=> 'required',
                            'requisitos_generales'=> 'required',
                            'alcance_objetivos'=> 'required',
                            'alcance_metrica'=> 'required',
                            'alcance_aprobacion_persona'=> 'required',
                            'alcance_aprobacion_departamento'=> 'required',
                            'tiempo_objetivos'=> 'required',
                            'tiempo_metrica'=> 'required',
                            'tiempo_aprobacion_persona'=> 'required',
                            'tiempo_aprobacion_departamento'=> 'required',
                            'presupuesto_objetivos'=> 'required',
                            'presupuesto_metrica'=> 'required',
                            'presupuesto_aprobacion_persona'=> 'required',
                            'presupuesto_aprobacion_departamento'=> 'required',
                            'calidad_objetivos'=> 'required',
                            
                          '  calidad_metrica'=> 'required',
                            'calidad_aprobacion_persona'=> 'required',
                            'calidad_aprobacion_departamento'=> 'required',
                            
                            'otros_objetivos'=> 'required',
                            'otros_metrica'=> 'required',
                            'otros_aprobacion_persona'=> 'required',
                           ' otros_aprobacion_departamento'=> 'required',
                            
                            'fase'=> 'required',
                            'hito_fase'=> 'required',
                            'duracion_fase'=> 'required',
                            
                            'hito'=> 'required',
                            'entregable'=> 'required',
                            'fecha_hito'=> 'required',
                            
                            'otrosRequisitos_nombre'=> 'required',
                            'otrosRequisitos_cargo'=> 'required',
                            
                            'limitacion'=> 'required',
                            'afecta_a'=> 'required',
                           ' valoracion'=> 'required',
                            
                            'riesgo'=> 'required',
                            'probabilidad'=> 'required',
                            'impacta_sobre'=> 'required',
                            'valoracion_riesgo'=> 'required',
                            
                            'departamentos_implicados'=> 'required',
                            'factores_criticos_de_exito'=> 'required',
                            'observaciones_adicionales'=> 'required',
                            'vision_estrategica'=> 'required',
                            
                            'maxima_desviacion'=> 'required',
                            'umbral_de_riesgo'=> 'required',
                           ' capacidad_tecnica'=> 'required',
                           ' volumen_contratacion'=> 'required',
                            'nivel_superior_desicion_persona'=> 'required',
                            'nivel_superior_desicion_departamento'=> 'required',
                            
                            'firma_director'=> 'required' */
                           
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
                $actaConstitucion = new ActaConstitucion([
                    'fecha'=>$request->input('fecha'),
                    'CLIENTE_PETICIONARIO' =>$request->input('CLIENTE_PETICIONARIO'),
                    'persona_Rpble_Cliente'=>$request->input('persona_Rpble_Cliente'),
                  /*  'departamento_cliente' =>$request->input('departamento_cliente'),
                    'sponsor'=>$request->input('sponsor'),
                    'persona_sponsor' =>$request->input('persona_sponsor'),
                    'departamento_sponsor'=>$request->input('departamento_sponsor'),
                    'director' =>$request->input('director'),
                    'persona_director'=>$request->input('persona_director'),
                    'departamaneto_director' =>$request->input('departamaneto_director'),
                    'codigo_proyecto'=>$request->input('codigo_proyecto'),
                    'check_pendienteAsignacion'=>$request->has('check_pendienteAsignacion') ? true : false ,
                    'check_contrato'=> $request->has('check_contrato') ? true : false ,
                    'check_casoNegocio'=> ($request->has('check_casoNegocio')) ? true : false ,
                            
                    'check_Enunciado'=> $request->has('check_Enunciado') ? true : false ,
                     'vision_estrategica'=> $request->input('vision_estrategica'),
                    'descripcion_del_proyecto'=> $request->input('descripcion_del_proyecto'),
                    'analisis_previo_viabilidad'=> $request->input('analisis_previo_viabilidad'),
                    'requisitos_generales'=>$request->input('requisitos_generales'),
                     'alcance_objetivos'=>$request->input('alcance_objetivos'),
                    'alcance_metrica'=>$request->input('alcance_metrica'),
                            'alcance_aprobacion_persona'=>$request->input('alcance_aprobacion_persona'),
                            'alcance_aprobacion_departamento'=>$request->input('alcance_aprobacion_departamento'),
                            'tiempo_objetivos'=>$request->input('tiempo_objetivos'),
                            'tiempo_metrica'=>$request->input('tiempo_metrica'),
                            'tiempo_aprobacion_persona'=>$request->input('tiempo_aprobacion_persona'),
                            'tiempo_aprobacion_departamento'=>$request->input('tiempo_aprobacion_departamento'),
                            'presupuesto_objetivos'=>$request->input('presupuesto_objetivos'),
                            'presupuesto_metrica'=>$request->input('presupuesto_metrica'),
                            'presupuesto_aprobacion_persona'=>$request->input('presupuesto_aprobacion_persona'),
                            'presupuesto_aprobacion_departamento'=>$request->input('presupuesto_aprobacion_departamento'),
                            'calidad_objetivos'=>$request->input('calidad_objetivos'),
                            
                          '  calidad_metrica'=> $request->input('calidad_metrica'),
                            'calidad_aprobacion_persona'=> $request->input('calidad_aprobacion_persona'),
                            'calidad_aprobacion_departamento'=>$request->input('calidad_aprobacion_departamento'),
                            
                            'otros_objetivos'=> $request->input('otros_objetivos'),
                            'otros_metrica'=> $request->input('otros_metrica'),
                            'otros_aprobacion_persona'=>$request->input('otros_aprobacion_persona'),
                           ' otros_aprobacion_departamento'=>$request->input('otros_aprobacion_departamento'),
                            
                            'fase'=> $request->input('fase'),
                            'hito_fase'=> $request->input('hito_fase'),
                            'duracion_fase'=>$request->input('duracion_fase'),
                            
                            'hito'=> $request->input('hito'),
                            'entregable'=>$request->input('entregable'),
                            'fecha_hito'=>$request->input('fecha_hito'),
                            
                            'otrosRequisitos_nombre'=>$request->input('otrosRequisitos_nombre'),
                            'otrosRequisitos_cargo'=>$request->input('otrosRequisitos_cargo'),
                            
                            'limitacion'=> $request->input('limitacion'),
                            'afecta_a'=> $request->input('afecta_a'),
                           ' valoracion'=> $request->input('valoracion'),
                            
                            'riesgo'=>$request->input('riesgo'),
                            'probabilidad'=> $request->input('probabilidad'),
                            'impacta_sobre'=> $request->input('impacta_sobre'),
                            'valoracion_riesgo'=>$request->input('valoracion_riesgo'),
                            
                            'departamentos_implicados'=> $request->input('departamentos_implicados'),
                            'factores_criticos_de_exito'=> $request->input('factores_criticos_de_exito'),
                            'observaciones_adicionales'=> $request->input('observaciones_adicionales'),
                            'vision_estrategica'=> $request->input('vision_estrategica'),
                            
                            'maxima_desviacion'=> $request->input('maxima_desviacion'),
                            'umbral_de_riesgo'=> $request->input('umbral_de_riesgo'),
                           ' capacidad_tecnica'=> $request->input('capacidad_tecnica'),
                           ' volumen_contratacion'=>$request->input('volumen_contratacion'),
                            'nivel_superior_desicion_persona'=> $request->input('nivel_superior_desicion_persona'),
                            'nivel_superior_desicion_departamento'=> $request->input('nivel_superior_desicion_departamento'),
                            
                            'firma_director'=> $request->input('firma_director'),
                    
                   */
                    'project_id'=>$project_id
                ]);
                $actaConstitucion->save();
                return response()->json($actaConstitucion);
           
            }
        }
       
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
        return response()->json($actaConstitucion);
    }  
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
            'fecha' => 'required',
            'CLIENTE_PETICIONARIO' => 'required',
            'persona_Rpble_Cliente' => 'required', 
          /*  'departamento_cliente' => 'required',
            'sponsor' => 'required',
            'persona_sponsor' => 'required',
            'departamento_sponsor' => 'required',
            'director'=> 'required',
            'persona_director'=> 'required',
            'departamaneto_director'=> 'required',
            'codigo_proyecto'=> 'required',
            'check_pendienteAsignacion' => 'required',
            'check_contrato'=> 'required',
            'check_casoNegocio'=> 'required',
            
            'check_Enunciado'=> 'required',
            'vision_estrategica'=> 'required',
            'descripcion_del_proyecto'=> 'required',
            'analisis_previo_viabilidad'=> 'required',
            'requisitos_generales'=> 'required',
            'alcance_objetivos'=> 'required',
            'alcance_metrica'=> 'required',
            'alcance_aprobacion_persona'=> 'required',
            'alcance_aprobacion_departamento'=> 'required',
            'tiempo_objetivos'=> 'required',
            'tiempo_metrica'=> 'required',
            'tiempo_aprobacion_persona'=> 'required',
            'tiempo_aprobacion_departamento'=> 'required',
            'presupuesto_objetivos'=> 'required',
            'presupuesto_metrica'=> 'required',
            'presupuesto_aprobacion_persona'=> 'required',
            'presupuesto_aprobacion_departamento'=> 'required',
            'calidad_objetivos'=> 'required',
            
          '  calidad_metrica'=> 'required',
            'calidad_aprobacion_persona'=> 'required',
            'calidad_aprobacion_departamento'=> 'required',
            
            'otros_objetivos'=> 'required',
            'otros_metrica'=> 'required',
            'otros_aprobacion_persona'=> 'required',
           ' otros_aprobacion_departamento'=> 'required',
            
            'fase'=> 'required',
            'hito_fase'=> 'required',
            'duracion_fase'=> 'required',
            
            'hito'=> 'required',
            'entregable'=> 'required',
            'fecha_hito'=> 'required',
            
            'otrosRequisitos_nombre'=> 'required',
            'otrosRequisitos_cargo'=> 'required',
            
            'limitacion'=> 'required',
            'afecta_a'=> 'required',
           ' valoracion'=> 'required',
            
            'riesgo'=> 'required',
            'probabilidad'=> 'required',
            'impacta_sobre'=> 'required',
            'valoracion_riesgo'=> 'required',
            
            'departamentos_implicados'=> 'required',
            'factores_criticos_de_exito'=> 'required',
            'observaciones_adicionales'=> 'required',
            'vision_estrategica'=> 'required',
            
            'maxima_desviacion'=> 'required',
            'umbral_de_riesgo'=> 'required',
           ' capacidad_tecnica'=> 'required',
           ' volumen_contratacion'=> 'required',
            'nivel_superior_desicion_persona'=> 'required',
            'nivel_superior_desicion_departamento'=> 'required',
            
            'firma_director'=> 'required' */

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $actaConstitucion->fecha = $request->fecha;
        $actaConstitucion->CLIENTE_PETICIONARIO = $request->CLIENTE_PETICIONARIO;
       
        
        $actaConstitucion->persona_Rpble_Cliente = $request->persona_Rpble_Cliente; 
   /*     $actaConstitucion->departamento_cliente = $request->departamento_cliente;
        $actaConstitucion->sponsor = $request->sponsor;
        $actaConstitucion->persona_sponsor = $request->persona_sponsor;
        $actaConstitucion->departamento_sponsor = $request->departamento_sponsor;
        $actaConstitucion->director = $request->director;
        $actaConstitucion->persona_director= $request->persona_director;
        $actaConstitucion->departamaneto_director = $request->departamaneto_director;
        $actaConstitucion->codigo_proyecto = $request->codigo_proyecto;
        $actaConstitucion->check_pendienteAsignacion = $request->check_pendienteAsignacion;
        $actaConstitucion->check_contrato = $request->check_contrato;
        $actaConstitucion->check_casoNegocio = $request->check_casoNegocio;
        $actaConstitucion->check_Enunciado = $request->check_Enunciado;
        $actaConstitucion->vision_estrategica = $request->vision_estrategica;
        $actaConstitucion->descripcion_del_proyecto = $request->descripcion_del_proyecto;
        $actaConstitucion->analisis_previo_viabilidad = $request->analisis_previo_viabilidad;
        $actaConstitucion->requisitos_generales = $request->requisitos_generales;
        $actaConstitucion->alcance_objetivos = $request->alcance_objetivos;
        $actaConstitucion->alcance_metrica = $request->alcance_metrica;
        $actaConstitucion->alcance_aprobacion_persona = $request->alcance_aprobacion_persona;
        $actaConstitucion->alcance_aprobacion_departamento = $request->alcance_aprobacion_departamento;
        $actaConstitucion->tiempo_objetivos = $request->tiempo_objetivos;
        $actaConstitucion->tiempo_metrica = $request->tiempo_metrica;
        $actaConstitucion->tiempo_aprobacion_persona = $request->tiempo_aprobacion_persona;
        $actaConstitucion->tiempo_aprobacion_departamento = $request->tiempo_aprobacion_departamento;
        $actaConstitucion->presupuesto_objetivos = $request->presupuesto_objetivos;
        $actaConstitucion->presupuesto_metrica = $request->presupuesto_metrica;
        $actaConstitucion->presupuesto_aprobacion_persona = $request->presupuesto_aprobacion_persona;
        $actaConstitucion->presupuesto_aprobacion_departamento = $request->presupuesto_aprobacion_departamento;
        $actaConstitucion->calidad_objetivos = $request->calidad_objetivos;
        $actaConstitucion->calidad_metrica = $request->calidad_metrica;
        $actaConstitucion->calidad_aprobacion_persona = $request->calidad_aprobacion_persona;
        $actaConstitucion->calidad_aprobacion_departamento = $request->calidad_aprobacion_departamento;
        $actaConstitucion->otros_objetivos = $request->otros_objetivos;
        $actaConstitucion->otros_metrica = $request->otros_metrica;
        $actaConstitucion->otros_aprobacion_persona = $request->otros_aprobacion_persona;
        $actaConstitucion->otros_aprobacion_departamento = $request->otros_aprobacion_departamento;
        $actaConstitucion->fase = $request->fase;
        $actaConstitucion->hito_fase = $request->hito_fase;
        $actaConstitucion->duracion_fase = $request->duracion_fase;
        $actaConstitucion->hito = $request->hito;
        $actaConstitucion->entregable = $request->entregable;
        $actaConstitucion->fecha_hito = $request->fecha_hito;
        $actaConstitucion->otrosRequisitos_nombre = $request->otrosRequisitos_nombre;
        $actaConstitucion->otrosRequisitos_cargo = $request->otrosRequisitos_cargo;
        $actaConstitucion->limitacion = $request->limitacion;
        $actaConstitucion->afecta_a = $request->afecta_a;
        $actaConstitucion->valoracion = $request->valoracion;
        $actaConstitucion->riesgo = $request->riesgo;
        $actaConstitucion->probabilidad = $request->probabilidad;
        $actaConstitucion->impacta_sobre = $request->impacta_sobre;
        $actaConstitucion->valoracion_riesgo = $request->valoracion_riesgo;
        $actaConstitucion->departamentos_implicados = $request->departamentos_implicados;
        $actaConstitucion->factores_criticos_de_exito = $request->factores_criticos_de_exito;
        $actaConstitucion->observaciones_adicionales = $request->observaciones_adicionales;
        $actaConstitucion->vision_estrategica = $request->vision_estrategica;
        $actaConstitucion->maxima_desviacion = $request->maxima_desviacion;
        $actaConstitucion->umbral_de_riesgo = $request->umbral_de_riesgo;
        $actaConstitucion->capacidad_tecnica = $request->capacidad_tecnica;
        $actaConstitucion->volumen_contratacion = $request->volumen_contratacion;
        $actaConstitucion->nivel_superior_desicion_persona = $request->nivel_superior_desicion_persona;
        $actaConstitucion->nivel_superior_desicion_departamento = $request->nivel_superior_desicion_departamento;
        $actaConstitucion->firma_director = $request->firma_director; */
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
    public function destroy(ActaConstitucion $actaConstitucion)
    {
        $actaConstitucion->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
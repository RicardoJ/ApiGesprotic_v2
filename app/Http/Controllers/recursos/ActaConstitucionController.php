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
                            'nombre' => 'required',
                            'fecha' => 'required',
                          /*  'cliente' => 'required', 
                            'patrocinador' => 'required',
                            'codigo_identificacion' => 'required',
                            'pendiente_asignacion' => 'required',
                            'contrato' => 'required',
                            'caso_de_negocio'=> 'required',
                            'enunciado_trabajo'=> 'required',
                            'vision_estrategica'=> 'required',
                            'descripcion_del_proyecto'=> 'required',
                            'analisis_de_viabilidad'=> 'required',
                            'requisitos_generales'=> 'required',
                            'objetivos_alcance'=> 'required',
                            'metrica_alcance'=> 'required',
                            'aprobacion_persona_alcance'=> 'required',
                            'obejtivos_plazo'=> 'required',
                            'metrica_plazo'=> 'required',
                            'aprobacion_persona_plazo'=> 'required',
                            'obejtivos_presupuesto'=> 'required',
                            'metrica_presupuesto'=> 'required',
                            'aprobacion_persona_presupuesto'=> 'required',
                            'obejtivos_calidad'=> 'required',
                            'metrica_calidad'=> 'required',
                            'aprobacion_persona_calidad'=> 'required',
                            'obejtivos_otros'=> 'required',
                            'metrica_otros'=> 'required',
                            'aprobacion_persona_otros'=> 'required',
                            'fase'=> 'required',
                            'hitoFase'=> 'required',
                            'duracion'=> 'required',
                            'hito'=> 'required',
                            'entregable'=> 'required',
                            'fecha_fase'=> 'required',
                            'nombre_principalesImplicados'=> 'required',
                            'cargo'=> 'required',
                            'limitacion'=> 'required',
                            'afecta_a'=> 'required',
                            'valoracionLimitacion'=> 'required',
                            'riesgo'=> 'required',
                            'probabilidad'=> 'required',
                            'impacta_sobre'=> 'required',
                            'valoracionRiesgo'=> 'required',
                            'departamentos_implicados'=> 'required',
                            'normativa_aplicable'=> 'required',
                            'factores_criticos_de_exito'=> 'required',
                            'observaciones'=> 'required',
                            'maxima_desviacion_sobre_presupuesto'=> 'required',
                            'umbral_de_riesgo_aceptable'=> 'required',
                            'capacidad_tecnica_de_desicion'=> 'required',
                            'volumen_de_contratacion'=> 'required', 
                            'persona_nivel_superior_de_desicion'=> 'required'
*/

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
                    'nombre' =>$request->input('nombre'),
                    'fecha'=>$request->input('fecha'),

                   /*opcion 1 , colocando la variable en el validador variable secure
                    "secure" => (Input::has("secure")) ? true : false,*/
                    'project_id'=>$project_id


                    /*opcion2
                    if (! isset( Input::get('secure') )){
                        Input::get('secure')= 0;
                        }*/

                        /* opcion 3 variable secure 
                        if (Input::get('customer_data')) {
                        // El usuario marcó el checkbox 
                        } else {
                        // El usuario NO marcó el chechbox
                            }
                        */
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
        'nombre'=>'required',
        'fecha'=>'required',
     /*   'cliente'=>'required', 
        'patrocinador'=>'required',
        'codigo_identificacion'=>'required',
        'pendiente_asignacion'=>'required',
        'contrato'=>'required',
        'caso_de_negocio'=>'required',
        'enunciado_trabajo'=>'required',
        'vision_estrategica'=>'required',
        'descripcion_del_proyecto'=>'required',
        'analisis_de_viabilidad'=>'required',
        'requisitos_generales'=>'required',
        'objetivos_alcance'=>'required',
        'metrica_alcance'=>'required',
        'aprobacion_persona_alcance'=>'required',
        'obejtivos_plazo'=>'required',
        'metrica_plazo'=>'required',
        'aprobacion_persona_plazo'=>'required',
        'obejtivos_presupuesto'=>'required',
        'metrica_presupuesto'=>'required',
        'aprobacion_persona_presupuesto'=>'required',
        'obejtivos_calidad'=>'required',
        'metrica_calidad'=>'required',
        'aprobacion_persona_calidad'=>'required',
        'obejtivos_otros'=>'required',
        'metrica_otros'=>'required',
        'aprobacion_persona_otros'=>'required',
        'fase'=>'required',
        'hitoFase'=>'required',
        'duracion'=>'required',
        'hito'=>'required',
        'entregable'=>'required',
        'fecha'=>'required',
        'nombre_principalesImplicados'=>'required',
        'cargo'=>'required',
        'limitacion'=>'required',
        'afecta_a'=>'required',
        'valoracionLimitacion'=>'required',
        'riesgo'=>'required',
        'probabilidad'=>'required',
        'impacta_sobre'=>'required',
        'valoracionRiesgo'=>'required',
        'departamentos_implicados'=>'required',
        'normativa_aplicable'=>'required',
        'factores_criticos_de_exito'=>'required',
        'observaciones'=>'required',
        'maxima_desviacion_sobre_presupuesto'=>'required',
        'umbral_de_riesgo_aceptable'=>'required',
        'capacidad_tecnica_de_desicion'=>'required',
        'volumen_de_contratacion'=>'required',
        'persona_nivel_superior_de_desicion'=>'required' */
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $actaConstitucion->nombre = $request->nombre;
        $actaConstitucion->fecha = $request->fecha;
        /*
        $actaConstitucion->cliente = $request->cliente; 
        $actaConstitucion->codigo_identificacion = $request->codigo_identificacion;
        $actaConstitucion->pendiente_asignacion = $request->pendiente_asignacion;
        $actaConstitucion->contrato = $request->contrato;
        $actaConstitucion->caso_de_negocio = $request->caso_de_negocio;
        $actaConstitucion->enunciado_trabajo = $request->enunciado_trabajo;
        $actaConstitucion->vision_estrategica= $request->vision_estrategica;
        $actaConstitucion->descripcion_del_proyecto = $request->descripcion_del_proyecto;
        $actaConstitucion->analisis_de_viabilidad = $request->analisis_de_viabilidad;
        $actaConstitucion->requisitos_generales = $request->requisitos_generales;
        $actaConstitucion->objetivos_alcance = $request->objetivos_alcance;
        $actaConstitucion->metrica_alcance = $request->metrica_alcance;
        $actaConstitucion->aprobacion_persona_alcance = $request->aprobacion_persona_alcance;
        $actaConstitucion->obejtivos_plazo = $request->obejtivos_plazo;
        $actaConstitucion->metrica_plazo = $request->metrica_plazo;
        $actaConstitucion->aprobacion_persona_plazo = $request->aprobacion_persona_plazo;
        $actaConstitucion->obejtivos_presupuesto = $request->obejtivos_presupuesto;
        $actaConstitucion->metrica_presupuesto = $request->metrica_presupuesto;
        $actaConstitucion->aprobacion_persona_presupuesto = $request->aprobacion_persona_presupuesto;
        $actaConstitucion->obejtivos_calidad = $request->obejtivos_calidad;
        $actaConstitucion->metrica_calidad = $request->metrica_calidad;
        $actaConstitucion->aprobacion_persona_calidad = $request->aprobacion_persona_calidad;
        $actaConstitucion->obejtivos_otros = $request->obejtivos_otros;
        $actaConstitucion->metrica_otros = $request->metrica_otros;
        $actaConstitucion->aprobacion_persona_otros = $request->aprobacion_persona_otros;
        $actaConstitucion->fase = $request->fase;
        $actaConstitucion->hitoFase = $request->hitoFase;
        $actaConstitucion->duracion = $request->duracion;
        $actaConstitucion->hito = $request->hito;
        $actaConstitucion->entregable = $request->entregable;
        $actaConstitucion->fecha = $request->fecha;
        $actaConstitucion->nombre_principalesImplicados = $request->nombre_principalesImplicados;
        $actaConstitucion->cargo = $request->cargo;
        $actaConstitucion->limitacion = $request->limitacion;
        $actaConstitucion->afecta_a = $request->afecta_a;
        $actaConstitucion->valoracionLimitacion = $request->valoracionLimitacion;
        $actaConstitucion->riesgo = $request->riesgo;
        $actaConstitucion->probabilidad = $request->probabilidad;
        $actaConstitucion->impacta_sobre = $request->impacta_sobre;
        $actaConstitucion->valoracionRiesgo = $request->valoracionRiesgo;
        $actaConstitucion->departamentos_implicados = $request->departamentos_implicados;
        $actaConstitucion->normativa_aplicable = $request->normativa_aplicable;
        $actaConstitucion->factores_criticos_de_exito = $request->factores_criticos_de_exito;
        $actaConstitucion->observaciones = $request->observaciones;
        $actaConstitucion->maxima_desviacion_sobre_presupuesto = $request->maxima_desviacion_sobre_presupuesto;
        $actaConstitucion->umbral_de_riesgo_aceptable = $request->umbral_de_riesgo_aceptable;
        $actaConstitucion->capacidad_tecnica_de_desicion = $request->capacidad_tecnica_de_desicion;
        $actaConstitucion->volumen_de_contratacion = $request->volumen_de_contratacion;
        $actaConstitucion->persona_nivel_superior_de_desicion = $request->persona_nivel_superior_de_desicion;
*/
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

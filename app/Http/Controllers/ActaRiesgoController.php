<?php

namespace App\Http\Controllers;

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
        $this->validate($request, [
                            'nombre'=> 'required',
                            'director'=> 'required',
                           /* 'version'=> 'required',
                            'edicion_revisada'=> 'required',
                            'fecha_edicion_revisada'=> 'required',
                            'fecha_revision'=> 'required',
                            'descripcion_proceso_de_gestion'=> 'required',
                            'heramientas_de_identificacion_y_estimacion'=> 'required',
                            'tarea'=> 'required',
                            'responsable'=> 'required',
                            'stakeholder'=> 'required',
                            'tiempo'=> 'required',
                            'calidad'=> 'required',
                            'coste'=> 'required',
                            'otro'=> 'required',
                            'tipo_de_riesgo'=>'required',
                            'causas'=>  'required',
                            'nivel_probabilidad'=> 'required',
                            'descripcion_probabilidad'=> 'required',
                            'presupuesto_gestion_riesgos'=> 'required',
                            'protocolo_contigencia'=> 'required',
                            'protocolo_de_control_riesgos'=> 'required',
                            'protocolo_de_conmunicacion_riesgos'=> 'required',
                            'protocolo_de_auditoria_riesgos'=> 'required',
            */
                                            ]);
$project=Project::find($project_id);
if (!$project) {
    return response()->json(['No existe proyecto'],404);
}else{
    $actaRiesgo = $project->actaRiesgo;
    if ($actaRiesgo) {
        return response()->json(['ya tiene acta de riesgo este proyecto'],404);
    } else {
        $actaRiesgo = new ActaRiesgo([
            'nombre' =>$request->input('nombre'),
            'director'=>$request->input('director'),
            'project_id'=>$project_id
        ]);
        $actaRiesgo->save();
        return response()->json($actaRiesgo);
        }
    }
}
/*
$actaRiesgo->create(
$request->only([
                            'nombre',
                            'director',
                            'version',
                            'edicion_revisada',
                            'fecha_edicion_revisada',
                            'fecha_revision',
                            'descripcion_proceso_de_gestion',
                            'heramientas_de_identificacion_y_estimacion',
                            'tarea',
                            'responsable',
                            'stakeholder',
                            'tiempo',
                            'calidad',
                            'coste',
                            'otro',
                            'tipo_de_riesgo',
                            'causas',
                            'nivel_probabilidad',
                            'descripcion_probabilidad',
                            'presupuesto_gestion_riesgos',
                            'protocolo_contigencia',
                            'protocolo_de_control_riesgos',
                            'protocolo_de_conmunicacion_riesgos',
                            'protocolo_de_auditoria_riesgos'
                            ])
                        );
                        return response()->json($actaRiesgo);
                            }
*/

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
        $this->validate($request, [
                            'nombre',
                            'director',
                    /*        'version',
                            'edicion_revisada',
                            'fecha_edicion_revisada',
                            'fecha_revision',
                            'descripcion_proceso_de_gestion',
                            'heramientas_de_identificacion_y_estimacion',
                            'tarea',
                            'responsable',
                            'stakeholder',
                            'tiempo',
                            'calidad',
                            'coste',
                            'otro',
                            'tipo_de_riesgo',
                            'causas',
                            'nivel_probabilidad',
                            'descripcion_probabilidad',
                            'presupuesto_gestion_riesgos',
                            'protocolo_contigencia',
                            'protocolo_de_control_riesgos',
                            'protocolo_de_conmunicacion_riesgos',
                            'protocolo_de_auditoria_riesgos'
          */
                    
                ]);
        
                $actaRiesgo->nombre = $request->nombre;
                $actaRiesgo->director = $request->director;
              /*  $actaRiesgo->edicion_revisada = $request->edicion_revisada;
                $actaRiesgo->fecha_edicion_revisada = $request->fecha_edicion_revisada;
                $actaRiesgo->fecha_revision = $request->fecha_revision;
                $actaRiesgo->descripcion_proceso_de_gestion = $request->descripcion_proceso_de_gestion;
                $actaRiesgo->heramientas_de_identificacion_y_estimacion = $request->heramientas_de_identificacion_y_estimacion;
                $actaRiesgo->tarea = $request->tarea;
                $actaRiesgo->responsable = $request->responsable;
                $actaRiesgo->stakeholder= $request->stakeholder;
                $actaRiesgo->tiempo = $request->tiempo;
                $actaRiesgo->calidad = $request->calidad;
                $actaRiesgo->coste = $request->coste;
                $actaRiesgo->otro = $request->otro;
                $actaRiesgo->tipo_de_riesgo = $request->tipo_de_riesgo;
                $actaRiesgo->causas = $request->causas;
                $actaRiesgo->nivel_probabilidad = $request->nivel_probabilidad;
                $actaRiesgo->descripcion_probabilidad = $request->descripcion_probabilidad;
                $actaRiesgo->presupuesto_gestion_riesgos = $request->presupuesto_gestion_riesgos;
                $actaRiesgo->protocolo_contigencia = $request->protocolo_contigencia;
                $actaRiesgo->protocolo_de_control_riesgos = $request->protocolo_de_control_riesgos;
                $actaRiesgo->protocolo_de_conmunicacion_riesgos = $request->protocolo_de_conmunicacion_riesgos;
                $actaRiesgo->protocolo_de_auditoria_riesgos = $request->protocolo_de_auditoria_riesgos;
               
                */
        
                $actaRiesgo->save();
                return response()->json($actaRiesgo);
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

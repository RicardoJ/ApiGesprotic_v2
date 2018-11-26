<?php

namespace App\Http\Controllers;
use Validator;
use App\Activities;
use App\Project_team;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Activities::all());
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
            
            'fecha' => 'required',
            'codigo_Actividad'=> 'required',
            'actividad'=> 'required',
            'descripcion_trabajo'=> 'required',
           ' actividad_predecesora'=> 'required',
            'relaciones_logicas_predecesora'=> 'required',
            'adelantos_o_atrasos_predecesora'=> 'required',
            'actividad_sucesora'=> 'required',
            'relaciones_logicas_sucesora'=> 'required',
            'adelantos_o_atraso_sucesora'=> 'required',
            'nombre_recurso_requierido'=> 'required',
           ' habilidades'=> 'required',
            'otros_recursos_requerido'=> 'required',
            'nivel_esfuerzo'=> 'required',
            'supuesto'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project_team=Project_team::findOrFail($project_team_id);
        if (!$project_team) {
            return response()->json(['No existe proyecto'],404);
        }else{
        $activities = new Activities([
            'fecha' =>$request->input('fecha'),
            'codigo_Actividad' =>$request->input('codigo_Actividad'),
            'actividad'=>$request->input('actividad'),
            'descripcion_trabajo' =>$request->input('descripcion_trabajo'),
            'actividad_predecesora' =>$request->input('actividad_predecesora'),
            'relaciones_logicas_predecesora'=>$request->input('relaciones_logicas_predecesora'),
            'adelantos_o_atrasos_predecesora' =>$request->input('adelantos_o_atrasos_predecesora'),
            'actividad_sucesora' =>$request->input('actividad_sucesora'),
            'relaciones_logicas_sucesora'=>$request->input('relaciones_logicas_sucesora'),
            'adelantos_o_atraso_sucesora' =>$request->input('adelantos_o_atraso_sucesora'),
            'nombre_recurso_requierido' =>$request->input('nombre_recurso_requierido'),
            'habilidades'=>$request->input('habilidades'),
            'otros_recursos_requerido' =>$request->input('otros_recursos_requerido'),
            'nivel_esfuerzo' =>$request->input('nivel_esfuerzo'),
            'supuesto'=>$request->input('supuesto'),
            'project_team_id'=>$project_team_id
        ]);
        $activities->save();
        return response()->json($activities);
        /*
        $activities = new Activities();
        $activities->fill($request->all());
        $activities->save();
        */
        }
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function show(Activities $activities)
    {
        return response()->json($activities);
    }
    public function listarActividadporProyecto($project_team_id){
        $project_team =Project_team::find($project_team_id);
       
        if (!$project_team) {
            return response()->json(['No existe el proyecto'],404);
        }
        $activities = $project_team->activities;
        return response()->json(['integrantes del equipo proyecto'=>$activities],202);
    }

    /**
    * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activities $activities)
    {
        $validator = Validator::make($request->all(),[
            
            'fecha' => 'required',
            'codigo_Actividad'=> 'required',
            'actividad'=> 'required',
            'descripcion_trabajo'=> 'required',
           ' actividad_predecesora'=> 'required',
            'relaciones_logicas_predecesora'=> 'required',
            'adelantos_o_atrasos_predecesora'=> 'required',
            'actividad_sucesora'=> 'required',
            'relaciones_logicas_sucesora'=> 'required',
            'adelantos_o_atraso_sucesora'=> 'required',
            'nombre_recurso_requierido'=> 'required',
           ' habilidades'=> 'required',
            'otros_recursos_requerido'=> 'required',
            'nivel_esfuerzo'=> 'required',
            'supuesto'=> 'required'
           
        ]);

        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $activities->fecha = $request->fecha;
        $activities->codigo_Actividad = $request->codigo_Actividad;
        $activities->actividad =$request->actividad;

        $activities->descripcion_trabajo =$request->descripcion_trabajo;
        $activities->actividad_predecesora =$request->actividad_predecesora;
        $activities->relaciones_logicas_predecesora =$request->relaciones_logicas_predecesora;
        $activities->adelantos_o_atrasos_predecesora =$request->adelantos_o_atrasos_predecesora;
        $activities->actividad_sucesora =$request->actividad_sucesora;
        $activities->relaciones_logicas_sucesora =$request->relaciones_logicas_sucesora;
        $activities->adelantos_o_atraso_sucesora =$request->adelantos_o_atraso_sucesora;
        $activities->nombre_recurso_requierido =$request->nombre_recurso_requierido;
        $activities->habilidades =$request->habilidades;
        $activities->otros_recursos_requerido =$request->otros_recursos_requerido;
        $activities->nivel_esfuerzo =$request->nivel_esfuerzo;
        $activities->supuesto =$request->supuesto;
        $activities->save();
        return response()->json($activities);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activities $activities)
    {
       
            $activities->delete();
            return response()->json(['success' => 'borrado correctamente']);
        
        
        
    }


    public function completed(Project_team $project_team , Activities $activities){

        if($activities->completed==false){
    
            $activities->completed = true;
            $activities->update(['completed'=> $activities->completed]);
    
        }else{
            $activities->completed = false;
            $activities->update(['completed'=> $activities->completed]);
        }
    
       }
}

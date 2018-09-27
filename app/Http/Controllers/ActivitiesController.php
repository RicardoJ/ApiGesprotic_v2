<?php

namespace App\Http\Controllers;

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

        $this->validate($request, [
            'nombre' => 'required',
            'porcentaje' => 'required',
            'completed' => 'required'
           
        ]);

        $project_team=Project_team::find($project_team_id);
        if (!$project_team) {
            return response()->json(['No existe proyecto'],404);
        }else{
        $activities = new Activities([
            'nombre' =>$request->input('nombre'),
            'porcentaje' =>$request->input('porcentaje'),
            'completed'=>$request->input('completed'),
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
        $this->validate($request, [
            'nombre' => 'required',
            'porcentaje' => 'required',
            'completed' => 'required'
           
        ]);

        $activities->nombre = $request->nombre;
        $activities->porcentaje = $request->porcentaje;
        $activities->completed =$request->completed;
        $activities->save();
        return response()->json($activities);
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

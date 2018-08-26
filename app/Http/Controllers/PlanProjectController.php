<?php

namespace App\Http\Controllers;

use App\PlanProject;
use Illuminate\Http\Request;

class PlanProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PlanProject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'porcentaje' => 'required',
            'descripcion' => 'required',
            'completed' => 'required'
           
        ]);
        $planProject = new PlanProject();
        $planProject->fill($request->all());
        $planProject->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function show(planProject $planProject)
    {
        return response()->json($planProject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function edit(planProject $planProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planProject $planProject)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'completed' => 'required'
           
        ]);

        $planProject->nombre = $request->nombre;
        $planProject->porcentaje = $request->porcentaje;
        $planProject->descripcion = $request->descripcion;
        $planProject ->completed =$request->completed;
        $planProject->save();
        return response()->json($planProject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(planProject $planProject)
    {
        $planProject->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }


    
    public function completed(Project_team $projec , PlanProject $planProject){

        if($planProject->completed==false){
    
            $planProject->completed = true;
            $planProject->update(['completed'=> $planProject->completed]);
    
        }else{
            $planProject->completed = false;
            $planProject->update(['completed'=> $planProject->completed]);
        }
    
       }
}

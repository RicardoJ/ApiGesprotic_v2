<?php

namespace App\Http\Controllers;

use App\Activities;
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
            'completed' => 'required'
           
        ]);
        $activities = new Activities();
        $activities->fill($request->all());
        $activities->save();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function edit(Activities $activities)
    {
        //
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
            'nombre' => 'required',
            'completed' => 'required'
           
        ]);

        $activities->nombre = $request->nombre;
        $activities->porcentaje = $request->porcentaje;
        $activities ->completed =$request->completed;
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

<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 

      $project = Project::all()->toArray();
      return response()->json($project);
        //return response()->json(Project::all());
       // return response('INDEX',200);
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
            'director' => 'required',
            'nombre' => 'required',
            'plan' => 'required',
            'completed' => 'required'
        ]);

        $project = new Project;
        $project->create(
            $request->only(['director', 'nombre','completed', 'plan'])
        );
        return response()->json($project);
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $this->validate($request, [
            'director' => 'required|',
            'nombre' => 'required|',
            'plan' => 'required|',
            'completed' => 'required'
        ]);
        $project->director = $request->director;
        $project->nombre = $request->nombre;
        $project->plan = $request->plan;
        $activities -> completed =$request->completed;
        $project->save();
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }

   public function completed(Project $project){

    if($project->completed==false){

        $project->completed = true;
        $project->update(['completed'=> $project->completed]);

    }else{
        $project->completed = false;
        $project->update(['completed'=> $project->completed]);
    }

   }

   
}

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
        //
        return response()->json(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'director' => 'required',
            'nombre' => 'required|',
            'plan' => 'required'
        ]);

        $project = new Project;
        $project->create(
            $request->only(['director', 'nombre', 'plan'])
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
            'plan' => 'required|'
        ]);
        $project->director = $request->director;
        $project->nombre = $request->nombre;
        $project->plan = $request->plan;
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

    /*
    public function acta(Project $project, Request $request){
        $project->acta()->create([
            'nombre' => $request->nombre,
            'tipo' => 'proyecto'
        ]);
    }
    public function actaRiesgo(Project $project, Request $request){
        $project->acta()->create([
            'nombre' => $request->nombre,
            'tipo' => 'riesgo'
        ]);
    }
    public function actaCambio(Project $project, Request $request){
        $project->acta()->create([
            'nombre' => $request->nombre,
            'tipo' => 'proyecto'
        ]);
    }
    public function actaConfiguracion(Project $project, Request $request){
        $project->acta()->create([
            'nombre' => $request->nombre,
            'tipo' => 'proyecto'
        ]);
    }
    */
}

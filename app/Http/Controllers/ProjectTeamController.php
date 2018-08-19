<?php

namespace App\Http\Controllers;

use App\Project_team;
use Illuminate\Http\Request;

class ProjectTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Project_team::all());
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
            'image' => 'required|image'
 
        ]);

        /**
         * si tenemos un archivo 'file' en el campo 'file'
         * Luego se guarda en el disco en public en una carpeta llamada image y ahi se va guardar
         * la imagen en el campo file
         * Luego se actualiza el post
         */
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $project_team->fill(['file' => asset($path)])->save();
        }
        $project_team = new Project_team;
        $project_team->create(
        $request->only(['nombre'])
        );
        return response()->json($project_team);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function show(Project_team $project_team)
    {
        return response()->json($project_team);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project_team $project_team)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'image' => 'required|image'
 
        ]);
          /**
         * si tenemos un archivo 'file' en el campo 'file'
         * Luego se guarda en el disco en public en una carpeta llamada image y ahi se va guardar
         * la imagen en el campo file
         * Luego se actualiza el post
         */

        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $project_team->fill(['file' => asset($path)])->save();
        }
        $project_team->nombre = $request->nombre;
        $project_team->image = $request->image;
       
        $project_team->save();
        return response()->json($project_team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project_team $project_team)
    {
        $project_team->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

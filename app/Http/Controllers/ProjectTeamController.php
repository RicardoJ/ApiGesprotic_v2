<?php

namespace App\Http\Controllers;

use App\Project_team;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    
    public function store(Request $request, $project_id)
    {
        $this->validate($request, [
            'nombre' => 'required|String',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
 
        ]);

        /*
         * si tenemos un archivo 'file' en el campo 'file'
         * Luego se guarda en el disco en public en una carpeta llamada image y ahi se va guardar
         * la imagen en el campo file 
         * Luego se actualiza el post
         */

        $project_team = new Project_team(['project_id'=>$project_id]);
        $project=Project::findOrFail($project_id);
        if (!$project) {
            return response()->json(['No existe  proyecto'],404);
        }else{
  
            
    if ($request->hasFile('image')) {
        $image = $request->File('image');
        $name = str_slug($request->title).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/projectTeam');
        $imagePath = $destinationPath. "/".  $name;
        $image->move($destinationPath, $name);
        $project_team->image = $name; 
      }
            
            $project_team->nombre =$request->get('nombre');
            //$project_team->image =$request->get('image');
               
           // $project_team->project_id = $request->get('project_id');
    
            
            $project_team->save();
            return response()->json($project_team);
        }
      
       
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

      
    public function listaProjectTeamPorProyecto($project_id){
        $project =Project::find($project_id);
       
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $project_team = $project->project_team;
        return response()->json(['Equipo del proyecto del proyecto'=>$project_team],202);
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

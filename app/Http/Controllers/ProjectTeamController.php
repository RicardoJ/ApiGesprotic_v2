<?php

namespace App\Http\Controllers;
use Validator;
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
        $validator = Validator::make($request->all(),[
            'nombre_equipo' => 'required|String',
            'fecha' => 'required',
            'rol' => 'required',
            'responsabilidad' => 'required',
            'ambito' => 'required',
            'competencias' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
 
        ]);

        /*
         * si tenemos un archivo 'file' en el campo 'file'
         * Luego se guarda en el disco en public en una carpeta llamada image y ahi se va guardar
         * la imagen en el campo file 
         * Luego se actualiza el post
         */
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project_team = new Project_team(['project_id'=>$project_id]);
        $project=Project::findOrFail($project_id);
        if (!$project) {
            return response()->json(['No existe  proyecto'],404);
        }else{
  
            
    if ($request->hasFile('image')) {
        $image = $request->File('image');
        $name = str_random(10).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/projectTeam');
        $imagePath = $destinationPath. "/".  $name;
        $image->move($destinationPath, $name);
        $project_team->image = $name; 
      }
            
            $project_team->nombre_equipo =$request->get('nombre_equipo');
            $project_team->fecha =$request->get('fecha');
            $project_team->rol =$request->get('rol');
            $project_team->responsabilidad =$request->get('responsabilidad');
            $project_team->ambito =$request->get('ambito');
            $project_team->competencias =$request->get('competencias');
            //$project_team->image =$request->get('image');
               
           // $project_team->project_id = $request->get('project_id');
    
            
            $project_team->save();
            return response()->json($project_team);
        }
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
    //x-wwww si content en POSTMAN
    public function updateName(Request $request, Project_team $project_team)
    {
        $validator = Validator::make($request->all(),[
            'nombre_equipo' => 'required',
            'fecha' => 'required',
            'rol' => 'required',
            'responsabilidad' => 'required',
            'ambito' => 'required',
            'competencias' => 'required'
   
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
 
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project_team->nombre_equipo = $request->nombre_equipo;
        $project_team->fecha =$request->fecha;
        $project_team->rol =$request->rol;
        $project_team->responsabilidad =$request->responsabilidad;
        $project_team->ambito =$request->ambito;
        $project_team->competencias =$request->competencias;
       
        $project_team->save();
        return response()->json(['Nombre Equipo del proyecto Editado'=>$project_team],202);
    }
}
//form data no content en POSTMAN
    public function updateImage(Request $request, $project_team_id)
    {
        $validator = Validator::make($request->all(),[
         //   'nombre' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
 
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project_team = Project_team::find($project_team_id);
       if ($request->hasFile('image')) {
        $image = $request->File('image');
        $name = str_random(10).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/projectTeam');
        $imagePath = $destinationPath. "/".  $name;
        $image->move($destinationPath, $name);
        $project_team->image = $name; 
      }
       
        $project_team->save();
        return response()->json(['Imagen Equipo del proyecto Editado'=>$project_team],202);
    }
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

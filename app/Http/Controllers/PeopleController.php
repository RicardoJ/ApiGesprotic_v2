<?php

namespace App\Http\Controllers;
use Validator;
use App\People;
use App\Project_team;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(People::all());
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'rol' => 'required',
            'email' => 'required|unique:people,email',  
            'departamento' => 'required',
            'lugar_de_trabajo' => 'required',
            'horario' => 'required',
            'tlf' => 'required'
]);

        if ($validator->fails()) {
            return response()->json(['Email ya existe'],404);

        }else{
        $project_team=Project_team::findOrFail($project_team_id);
        if (!$project_team) {
            return response()->json(['No existe proyecto'],404);
        }else{
        $people = new People([
            'nombre' =>$request->input('nombre'),
            'apellidos' =>$request->input('apellidos'),
            'rol'=>$request->input('rol'),
            'email'=>$request->input('email'),
            'departamento'=>$request->input('departamento'),
            'horario'=>$request->input('horario'),
            'lugar_de_trabajo'=>$request->input('lugar_de_trabajo'),
            'tlf'=>$request->input('tlf'),
            'project_team_id'=>$project_team_id
        ]);
        $people->save();
        return response()->json($people);
    }
     
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        return response()->json($people);
    }
    public function listarPersonasDeEquipo($project_team_id){
        $project_team =Project_team::find($project_team_id);
       
        if (!$project_team) {
            return response()->json(['No existe el proyecto'],404);
        }
        $people = $project_team->people;
        return response()->json(['integrantes del equipo proyecto'=>$people],202);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellidos' => 'required',
            'rol' => 'required',
            'departamento' => 'required',
            'lugar_de_trabajo' => 'required',
            'horario' => 'required',
            'tlf' => 'required',
       
         'email' => 'required|unique:people,email,'.$people->id
       
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $people->nombre = $request->nombre;
        $people->apellidos = $request->apellidos;
        $people->rol = $request->rol;
        $people->email = $request->email;
        $people->departamento = $request->departamento;
        $people->lugar_de_trabajo = $request->lugar_de_trabajo;
        $people->horario = $request->horario;
        $people->tlf = $request->tlf;
        $people->save();
        return response()->json($people);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

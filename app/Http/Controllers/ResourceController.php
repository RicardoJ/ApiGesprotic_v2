<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Project;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Resource::all());
        

        
    }
    public function listarRecursoPorProyecto($project_id){
        $project =Project::find($project_id);
       
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $resource = $project->resource;
        return response()->json(['Recurso del proyecto'=>$resource],202);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $project_id)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'fecha_Inicial' => 'required',
            'fecha_Final' => 'required',
            'nombre' => 'required',
            'origen' => 'required',
            'relevancia'=>'required',
            'tipo'=>'required',
            'unidades'=>'required' 

        ]);
        $project=Project::findOrFail($project_id);
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
        $resource = new Resource([
            'descripcion' => $request->input('descripcion'),
            'fecha_Inicial' => $request->input('fecha_Inicial'),
            'fecha_Final' => $request->input('fecha_Final'),
            'nombre' =>$request->input('nombre'),
            'origen' =>$request->input('origen'),
            'relevancia'=>$request->input('relevancia'),
            'tipo'=>$request->input('tipo'),
            'unidades'=>$request->input('unidades'),
            'project_id'=>$project_id
        ]);
         $resource->save();
        return response()->json($resource);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
       return response()->json($resource);
     
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'fecha_Inicial' => 'required',
            'fecha_Final' => 'required',
            'nombre' => 'required',
            'origen' => 'required',
            'relevancia'=>'required',
            'tipo'=>'required',
            'unidades'=>'required' 

        ]);
        $resource->descripcion = $request->descripcion;
        $resource->fecha_Inicial = $request->fecha_Inicial;
        $resource->fecha_Final = $request->fecha_Final;
        $resource->nombre = $request->nombre;
        $resource->origen = $request->origen;
        $resource->relevancia = $request->relevancia;
        $resource->tipo = $request->tipo;
        $resource->unidades = $request->unidades;
        $resource->save();
        return response()->json($resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

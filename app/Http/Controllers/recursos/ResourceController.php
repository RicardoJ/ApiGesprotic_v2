<?php

namespace App\Http\Controllers;
use Validator;
use App\Resource;
use App\Project;
use App\Provider;
use App\Agreement;
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

    public function listarRecursoPorProveedor($provider_id){
        $provider=Provider::findOrFail($provider_id);
       
        if (!$provider) {
            return response()->json(['No existe el proveedor'],404);
        }
        $resource = $provider->resource;
        return response()->json(['Recurso del proveedor'=>$resource],202);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $project_id)
    {
        $validator = Validator::make($request->all(),[
            'descripcion' => 'required',
            'fecha_Inicial' => 'required',
            'fecha_Final' => 'required',
            'nombre' => 'required',
            'origen' => 'required',
            'relevancia'=>'required',
            'tipo'=>'required',
            'unidades'=>'required' 

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
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
    }
    public function storeWithProvider(Request $request , $provider_id)
    {
        $validator = Validator::make($request->all(),[
            'descripcion' => 'required',
            'fecha_Inicial' => 'required',
            'fecha_Final' => 'required',
            'nombre' => 'required',
            'origen' => 'required',
            'relevancia'=>'required',
            'tipo'=>'required',
            'unidades'=>'required' 

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
            $provider=Provider::findOrFail($provider_id);
            if (!$provider) {
                return response()->json(['No existe  proveedor'],404);
            }else{
        $agreement = $provider->agreement;
        if (!$agreement) {
            return response()->json(['No tiene contrato este proveedor'],404);
        } else {
        $resource = new Resource([
            'descripcion' => $request->input('descripcion'),
            'fecha_Inicial' => $request->input('fecha_Inicial'),
            'fecha_Final' => $request->input('fecha_Final'),
            'nombre' =>$request->input('nombre'),
            'origen' =>$request->input('origen'),
            'relevancia'=>$request->input('relevancia'),
            'tipo'=>$request->input('tipo'),
            'unidades'=>$request->input('unidades'),
            'provider_id'=>$provider_id
        ]);
        $resource->save();
        return response()->json($resource);
    }
}
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
        $validator = Validator::make($request->all(),[
            'descripcion' => 'required',
            'fecha_Inicial' => 'required',
            'fecha_Final' => 'required',
            'nombre' => 'required',
            'origen' => 'required',
            'relevancia'=>'required',
            'tipo'=>'required',
            'unidades'=>'required' 

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
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

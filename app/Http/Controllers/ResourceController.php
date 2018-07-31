<?php

namespace App\Http\Controllers;

use App\Resource;
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $resource = new Resource;
        $resource->create(
        $request->only(['descripcion', 'fecha_Inicial', 'fecha_Final','nombre','origen','relevancia','tipo','unidades'])
        );
        return response()->json($resource);
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

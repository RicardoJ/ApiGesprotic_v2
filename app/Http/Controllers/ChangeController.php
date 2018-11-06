<?php

namespace App\Http\Controllers;
use Validator;
use App\Change;
use App\Project;
use Illuminate\Http\Request;

class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Change::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        $validator = Validator::make($request->all(),[
            'cambioPropuestoPor' => 'required',
            'descripcion' => 'required',
            'nombre' => 'required',
            'responsable' => 'required',
            'estado' => 'required'
        
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project=Project::findOrFail($project_id);
        if (!$project) {
            return response()->json(['No existe  proyecto'],404);
        }else{
        $change = new Change([
            'cambioPropuestoPor' =>$request->input('cambioPropuestoPor'),
            'descripcion' =>$request->input('descripcion'),
            'nombre' =>$request->input('nombre'),
            'responsable' =>$request->input('responsable'),
            'estado' =>$request->input('estado'),
            'project_id'=>$project_id

        ]);
         $change->save();
        return response()->json($change);
    }
    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function show(Change $change)
    {
        return response()->json($change);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Change $change)
    {
        $validator = Validator::make($request->all(),[
            'cambioPropuestoPor' => 'required',
            'descripcion' => 'required',
            'nombre' => 'required',
            'responsable' => 'required',
            'estado' => 'required'
        
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $change->cambioPropuestoPor = $request->cambioPropuestoPor;
        $change->descripcion = $request->descripcion;
        $change->nombre = $request->nombre;
        $change->responsable = $request->responsable;
        $change->estado = $request->estado;
       
        $change->save();
        return response()->json($change);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function destroy(Change $change)
    {
        $change->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

<?php

namespace App\Http\Controllers;
use Validator;
use App\fases_de_proyectos;
use Illuminate\Http\Request;

class FasesDeProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fases_de_proyectos  $fases_de_proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(fases_de_proyectos $fases_de_proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fases_de_proyectos  $fases_de_proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit(fases_de_proyectos $fases_de_proyectos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fases_de_proyectos  $fases_de_proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fases_de_proyectos $fases_de_proyectos)
    {
        $validator = Validator::make($request->all(),[
            

        'fecha_de_inicio'=>'required',
        'fecha_fin'=>'required',
        'nombre_de_hito'=>'required',
        'nombre_de_fase'=>'required',
        'entregable_principal'=>'required',
        'fecha_hito'=>'required'
            
        ]);
        if ($validator->fails()) {
            $errors=$validator->messages();
            return response()->json(['Error' => $errors],404);
        }else{
        $fases_de_proyectos->update($request->all());   
        $fases_de_proyectos->save();
        return response()->json($fases_de_proyectos);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fases_de_proyectos  $fases_de_proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy(fases_de_proyectos $fases_de_proyectos)
    {
        $fases_de_proyectos->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

<?php

namespace App\Http\Controllers;
use Validator;
use App\Otros_requisitos_de_proyecto;
use Illuminate\Http\Request;

class OtrosRequisitosDeProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Otros_requisitos_de_proyecto  $otros_requisitos_de_proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Otros_requisitos_de_proyecto $otros_requisitos_de_proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Otros_requisitos_de_proyecto  $otros_requisitos_de_proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Otros_requisitos_de_proyecto $otros_requisitos_de_proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Otros_requisitos_de_proyecto  $otros_requisitos_de_proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Otros_requisitos_de_proyecto $otros_requisitos_de_proyecto)
    {
        $validator = Validator::make($request->all(),[
            
            'nombre'=>'required',
            'cargo_departamento'=>'required'

            ]);
        
            if ($validator->fails()) {
                $errors=$validator->messages();
                return response()->json(['Error' => $errors],404);
            }else{
            $otros_requisitos_de_proyecto->update($request->all());   
            $otros_requisitos_de_proyecto->save();
            return response()->json($otros_requisitos_de_proyecto);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Otros_requisitos_de_proyecto  $otros_requisitos_de_proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Otros_requisitos_de_proyecto $otros_requisitos_de_proyecto)
    {
        $otros_requisitos_de_proyecto->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

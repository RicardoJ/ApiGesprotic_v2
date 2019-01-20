<?php

namespace App\Http\Controllers;
use Validator;
use App\Limitaciones_de_partida;
use Illuminate\Http\Request;

class LimitacionesDePartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Limitaciones_de_partida::all());
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
     * @param  \App\Limitaciones_de_partida  $limitaciones_de_partida
     * @return \Illuminate\Http\Response
     */
    public function show(Limitaciones_de_partida $limitaciones_de_partida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Limitaciones_de_partida  $limitaciones_de_partida
     * @return \Illuminate\Http\Response
     */
    public function edit(Limitaciones_de_partida $limitaciones_de_partida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Limitaciones_de_partida  $limitaciones_de_partida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Limitaciones_de_partida $limitaciones_de_partida)
    {
        
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'afecta_a' => 'required',
            'valoracion' => 'required'
            
        ]);
     
        if ($validator->fails()) {
            $errors=$validator->messages();
            return response()->json(['Error' => $errors],404);
        }else{
        $limitaciones_de_partida->update($request->all());   
        $limitaciones_de_partida->save();
        return response()->json($limitaciones_de_partida);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Limitaciones_de_partida  $limitaciones_de_partida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Limitaciones_de_partida $limitaciones_de_partida)
    {
        $limitaciones_de_partida->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

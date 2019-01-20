<?php

namespace App\Http\Controllers;
use Validator;
use App\Riesgos_iniciales_identificados;
use Illuminate\Http\Request;

class RiesgosInicialesIdentificadosController extends Controller
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
     * @param  \App\Riesgos_iniciales_identificados  $riesgos_iniciales_identificados
     * @return \Illuminate\Http\Response
     */
    public function show(Riesgos_iniciales_identificados $riesgos_iniciales_identificados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Riesgos_iniciales_identificados  $riesgos_iniciales_identificados
     * @return \Illuminate\Http\Response
     */
    public function edit(Riesgos_iniciales_identificados $riesgos_iniciales_identificados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Riesgos_iniciales_identificados  $riesgos_iniciales_identificados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riesgos_iniciales_identificados $riesgos_iniciales_identificados)
    {
        $validator = Validator::make($request->all(),[
            
            'nombre'=>'required',
            'probabilidad'=>'required',
            'impacta_sobre'=>'required',
            'valoracion'=>'required'

           
                
            ]);
            if ($validator->fails()) {
                $errors=$validator->messages();
                return response()->json(['Error' => $errors],404);
            }else{
            $riesgos_iniciales_identificados->update($request->all());   
            $riesgos_iniciales_identificados->save();
            return response()->json($riesgos_iniciales_identificados);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Riesgos_iniciales_identificados  $riesgos_iniciales_identificados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riesgos_iniciales_identificados $riesgos_iniciales_identificados)
    {
        $riesgos_iniciales_identificados->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

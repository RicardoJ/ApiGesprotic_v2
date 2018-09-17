<?php

namespace App\Http\Controllers;

use App\Acquisition;
use Illuminate\Http\Request;

class AcquisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Aqquisition::all());
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
        $aquisition = new Aqquisition;
        $aquisition->create(
        $request->only(['descripcion', 'fecha_Inicial', 'fecha_Final','nombre','origen','relevancia','tipo','unidades'])
        );
        return response()->json($aquisition);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function show(Acquisition $acquisition)
    {
        return response()->json($acquisition);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Acquisition $acquisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acquisition $acquisition)
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
        $acquisition->descripcion = $request->descripcion;
        $acquisition->fecha_Inicial = $request->fecha_Inicial;
        $acquisition->fecha_Final = $request->fecha_Final;
        $acquisition->nombre = $request->nombre;
        $acquisition->origen = $request->origen;
        $acquisition->relevancia = $request->relevancia;
        $acquisition->tipo = $request->tipo;
        $acquisition->unidades = $request->unidades;
        $acquisition->save();
        return response()->json($acquisition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acquisition $acquisition)
    {
        $acquisition->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

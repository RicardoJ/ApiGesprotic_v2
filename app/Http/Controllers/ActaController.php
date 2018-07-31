<?php

namespace App\Http\Controllers;

use App\Acta;
use Illuminate\Http\Request;

class ActaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Acta::all());
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
            'nombre' => 'required',
            'fecha' => 'required|date',
            'tipo' => 'required'
        ]);
        $acta = new Acta;
        $acta->create([
            'nombre' => $request->nombre,
            'tipo' => 'configuracion',
            'fecha' => time(),
        ]);
        return response()->json($acta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acta  $acta
     * @return \Illuminate\Http\Response
     */
    public function show(Acta $acta)
    {
        return response()->json($acta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acta  $acta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acta $acta)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha' => 'required|date',
            'tipo' => 'required'
        ]);
        $acta->nombre = $request->nombre;
        $acta->fecha = $request->fecha;
        $acta->tipo = $request->tipo;
        $acta->save();
        return response()->json($acta);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acta  $acta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acta $acta)
    {
        $acta->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

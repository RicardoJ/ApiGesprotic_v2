<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(People::all());
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
            'apellidos' => 'required',
            'rol' => 'required',
            'email' => 'required|unique:people,email',  
            'competencias' => 'required'


        ]);
        $people = new People;
        $people->create(
        $request->only(['nombre', 'apellidos', 'rol','email','competencias'])
        );
        return response()->json($people);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        return response()->json($people);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'rol' => 'required',
            'email' => 'required|unique',
            'competencias' => 'required'
        ]);

        $people->nombre = $request->nombre;
        $people->apellidos = $request->apellidos;
        $people->rol = $request->rol;
        $people->email = $request->email;
        $people->competencias = $request->competencias;
        $people->save();
        return response()->json($people);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        $people->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

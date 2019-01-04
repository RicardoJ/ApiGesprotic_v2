<?php

namespace App\Http\Controllers;
use Validator;
use App\limitacion;
use Illuminate\Http\Request;

class LimitacionController extends Controller
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
     * @param  \App\limitacion  $limitacion
     * @return \Illuminate\Http\Response
     */
    public function show(limitacion $limitacion)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\limitacion  $limitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, limitacion $limitacion)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required'
            
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $limitacion->update($request->all());   
        $limitacion->save();
        return response()->json($limitacion);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\limitacion  $limitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(limitacion $limitacion)
    {
        $limitacion->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

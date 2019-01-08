<?php

namespace App\Http\Controllers;

use App\fase;
use Illuminate\Http\Request;

class FaseController extends Controller
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
     * @param  \App\fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function show(fase $fase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function edit(fase $fase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fase $fase)
    {
        $validator = Validator::make($request->all(),[
            'fase' => 'required'
            
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $fase->update($request->all());   
        $fase->save();
        return response()->json($fase);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function destroy(fase $fase)
    {

        $fase->delete();
        return response()->json(['success' => 'borrado correctamente']);


        
    
    }
}

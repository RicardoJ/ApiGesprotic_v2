<?php

namespace App\Http\Controllers;

use App\LessonLearned;
use Illuminate\Http\Request;

class LessonLearnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(LessonLearned::all());
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
            'descripcion' => 'required',
            'objetivo' => 'required',
            'informe' => 'required'
            
        
        ]);
        $lessonLearned = new LessonLearned;
        $lessonLearned->create(
        $request->only(['nombre', 'descripcion', 'objetivo','informe'])
        );
        return response()->json($lessonLearned);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LessonLearned  $lessonLearned
     * @return \Illuminate\Http\Response
     */
    public function show(LessonLearned $lessonLearned)
    {
        return response()->json($lessonLearned);
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LessonLearned  $lessonLearned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LessonLearned $lessonLearned)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'objetivo' => 'required',
            'informe' => 'required'
            
        
        ]);
        $lessonLearned->nombre = $request->nombre;
        $lessonLearned->descripcion = $request->descripcion;
        $lessonLearned->objetivo = $request->objetivo;
        $lessonLearned->informe = $request->informe;
        $lessonLearned->save();
        return response()->json($lessonLearned);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LessonLearned  $lessonLearned
     * @return \Illuminate\Http\Response
     */
    public function destroy(LessonLearned $lessonLearned)
    {
        $lessonLearned->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

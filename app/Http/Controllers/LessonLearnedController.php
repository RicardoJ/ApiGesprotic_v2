<?php

namespace App\Http\Controllers;
use Validator;
use App\LessonLearned;
use App\Project;
use App\limitacion;
use Illuminate\Support\Facades\Input;
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
    public function store(Request $request, $project_id)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'limitaciones'=>'required'
        ]);

    

        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project=Project::findOrFail($project_id);
        
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
                $lessonLearned = $project->lessonLearned;
                if ($lessonLearned) {
                    return response()->json(['ya tiene leccion este proyecto'],404);
                } else {

        
                 $data= [  'nombre' =>$request->input('nombre'),
                 'descripcion'=>$request->input('descripcion'),
                 'project_id'=>$project_id]
                 ;   
                  
    
             $result = LessonLearned::create($data);

            $posts = $request->input('limitaciones');
             foreach ($posts as $value) {
                $data = [
                    'lesson_learned_id' => $result->id,
                    'nombre'=>$value['nombre']
                ];

               limitacion::create($data);
            }
            return response()->json([ 'Se prendió el carnaval'],200);
            


            } 
        }
       
        
    }
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
    public function listaLeccionPorProyecto($project_id){
        $project =Project::find($project_id);
        
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $lessonLearned = $project->lessonLearned;
        return response()->json(['leccion del proyecto'=>$lessonLearned],202);
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
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'objetivo' => 'required',
            'informe' => 'required'
            
        
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $lessonLearned->nombre = $request->nombre;
        $lessonLearned->descripcion = $request->descripcion;
        $lessonLearned->objetivo = $request->objetivo;
        $lessonLearned->informe = $request->informe;
        $lessonLearned->save();
        return response()->json($lessonLearned);
    }
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

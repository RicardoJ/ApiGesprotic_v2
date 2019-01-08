<?php

namespace App\Http\Controllers;
use Validator;
use App\LessonLearned;
use App\Project;
use App\limitacion;
use App\Fase;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
//https://medium.com/@hemnys25/de-0-a-100-con-eloquent-de-laravel-parte-1-8d9cc0de9364
class LessonLearnedController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lessons = LessonLearned::all();
        $save = array();
        foreach ($lessons as $lesson) {
            
             $l = limitacion::where('lesson_learned_id', $lesson['id'])->get();
             $e =  fase::where('lesson_learned_id', $lesson['id'])->get();
 
                $lesson->limitaciones = $l;
                $lesson->fase = $e;
              array_push($save,$lesson);  

        }
        
      
        return response()->json(['Leccion',$save],200);
    }

//creacion del recurso debe validar la creacion de los subrecursos

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
           
            'limitaciones'=>'required',
            'fases'=>'required'
        ]);
        if ($validator->fails()) {
            $errors=$validator->messages();
            return response()->json(['Error' => $errors],404);

        }else{
        $project=Project::findOrFail($project_id);
        
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
               // $lessonLearned = $project->lessonLearned;
                //if ($lessonLearned) {
                  //  return response()->json(['ya tiene leccion este proyecto'],404);
                //} else {

        
                 $data1= [  
                'nombre' =>$request->input('nombre'),
                 'descripcion'=>$request->input('descripcion'),
                 'project_id'=>$project_id]
                 ;   
                 
    
            $result = LessonLearned::create($data1);

            $limitaciones = $request->input('limitaciones');
            $save = array();
             foreach ($limitaciones as $value) {
                $data = [
                    'lesson_learned_id' => $result->id,
                    'nombre'=>$value['nombre']
                ];

             $limitacion =  limitacion::create($data);
          
            array_push($save, $limitacion);
            }
            $result->limitaciones = $save;

           //fase
           $fases = $request->input('fases');
            $save = array();
             foreach ($fases as $value) {
                $dataFase = [
                    'lesson_learned_id' => $result->id,
                    'fase'=>$value['fase']
                ];

             $fase =  fase::create($dataFase);
          
            array_push($save, $fase);
            }
            $result->fases = $save;     
            
            return response()->json(['Guardado',$result],200);
 
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

        $l = limitacion::where('lesson_learned_id', $lessonLearned['id'])->get();
        $e =  fase::where('lesson_learned_id', $lessonLearned['id'])->get();

 
        $lessonLearned->limitaciones = $l;
        $lessonLearned->fase = $e;
        return response()->json($lessonLearned);
    }
    public function listaLeccionPorProyecto($project_id)
    {

        $project =Project::find($project_id);
        
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $save = array();
        $lessons = $project->lessonLearned;
      foreach ($lessons as $lesson) {
            
        $l = limitacion::where('lesson_learned_id', $lesson['id'])->get();


           $lesson->limitaciones = $l;
         array_push($save,$lesson);  

   }
        return response()->json(['leccion del proyecto'=>$save],202);
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
            'limitaciones'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $lessonLearned->update($request->all());
        /*$lessonLearned->nombre = $request->nombre;
        $lessonLearned->descripcion = $request->descripcion;
  
        
        $lessonLearned->save();
        */
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
    public function destroy($id)
    {
        $lessonLearned = LessonLearned::find($id);
        $lessonLearned->limitacion()->delete();
        $lessonLearned->fase()->delete();
        $lessonLearned->delete();
        
        return response()->json(['success' => 'borrado correctamente']);
    }
}

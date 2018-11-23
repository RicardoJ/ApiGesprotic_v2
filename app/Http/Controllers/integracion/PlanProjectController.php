<?php

namespace App\Http\Controllers;
use Validator;
use App\PlanProject;
use App\ Project;
use Illuminate\Http\Request;

class PlanProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PlanProject::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'porcentaje' => 'required',
            'descripcion' => 'required',
            'completed' => 'required'
           
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $project=Project::findOrFail($project_id);
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
                $planProject = $project->planProject;
                if ($planProject) {
                    return response()->json(['ya tiene plan este proyecto'],404);
                } else {
                $planProject = new PlanProject([
                    'nombre' =>$request->input('nombre'),
                    'porcentaje'=>$request->input('porcentaje'),
                    'descripcion'=>$request->input('descripcion'),
                    'completed'=>$request->input('completed'),
                    'project_id'=>$project_id
                ]);
                $planProject->save();
                return response()->json($planProject);
        
                }
            }
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function show(planProject $planProject)
    {
        return response()->json($planProject);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planProject $planProject)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'completed' => 'required'
           
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $planProject->nombre = $request->nombre;
        $planProject->porcentaje = $request->porcentaje;
        $planProject->descripcion = $request->descripcion;
        $planProject ->completed =$request->completed;
        $planProject->save();
        return response()->json($planProject);
    }
    }

    
    public function listaplanPorProyecto($project_id){
        $project =Project::find($project_id);

        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $planProject = $project->planProject;
        return response()->json(['Plan del proyecto'=>$planProject],202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\planProject  $planProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(planProject $planProject)
    {
        $planProject->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }


    
    public function completed(Project_team $project_team , PlanProject $planProject){

        if($planProject->completed==false){
    
            $planProject->completed = true;
            $planProject->update(['completed'=> $planProject->completed]);
    
        }else{
            $planProject->completed = false;
            $planProject->update(['completed'=> $planProject->completed]);
        }
    
       }
}

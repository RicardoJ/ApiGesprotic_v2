<?php
namespace App\Http\Controllers;
use Validator;
use App\ProjectOrganization;
use App\ Project;
use Illuminate\Http\Request;
class ProjectOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProjectOrganization::all());
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
            
            'cliente_persona'=> 'required',
            'cliente_departamento'=> 'required',
            
            'principios'=> 'required',
            'directrices_comunicacion'=> 'required',
            'directrices_reunion'=> 'required',
            'proceso_desiciones'=> 'required',
            'directrices_conflictos'=> 'required',
            'compromisos'=> 'required',
            'otros_acuerdos'=> 'required',
            
            'aceptacion_acuerdo_persona'=> 'required',
            'aceptacion_Acuerdo_firma'=> 'required'
           
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $project=Project::findOrFail($project_id);
            if (!$project) {
                return response()->json(['No existe proyecto'],404);
            }else{
                $projectOrganization = $project->projectOrganization;
                if ($projectOrganization) {
                    return response()->json(['ya tiene organizacion de proyecto'],404);
                } else {
                $projectOrganization = new ProjectOrganization([
                    
                    
                    'cliente_persona'=>$request->input('cliente_persona'),
            'cliente_departamento'=>$request->input('cliente_departamento'),
            
            'principios'=>$request->input('principios'),
            'directrices_comunicacion'=>$request->input('directrices_comunicacion'),
            'directrices_reunion'=>$request->input('directrices_reunion'),
            'proceso_desiciones'=>$request->input('proceso_desiciones'),
            'directrices_conflictos'=>$request->input('directrices_conflictos'),
            'compromisos'=>$request->input('compromisos'),
            'otros_acuerdos'=>$request->input('otros_acuerdos'),
            
            'aceptacion_acuerdo_persona'=>$request->input('aceptacion_acuerdo_persona'),
            'aceptacion_Acuerdo_firma'=>$request->input('aceptacion_Acuerdo_firma'),
                    'project_id'=>$project_id
                ]);
                $projectOrganization->save();
                return response()->json($projectOrganization);
        
                }
            }
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectOrganization  $projectOrganization
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectOrganization $projectOrganization)
    {
        return response()->json($projectOrganization);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectOrganization  $projectOrganization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectOrganization $projectOrganization)
    {
        $validator = Validator::make($request->all(),[
            'cliente_persona'=> 'required',
            'cliente_departamento'=> 'required',
            
            'principios'=> 'required',
            'directrices_comunicacion'=> 'required',
            'directrices_reunion'=> 'required',
            'proceso_desiciones'=> 'required',
            'directrices_conflictos'=> 'required',
            'compromisos'=> 'required',
            'otros_acuerdos'=> 'required',
            
            'aceptacion_acuerdo_persona'=> 'required',
            'aceptacion_Acuerdo_firma'=> 'required'
           
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $projectOrganization->cliente_persona = $request->cliente_persona;
        $projectOrganization->cliente_departamento = $request->cliente_departamento;
        $projectOrganization->principios = $request->principios;
        $projectOrganization->directrices_comunicacion = $request->directrices_comunicacion;
        $projectOrganization->directrices_reunion = $request->directrices_reunion;
        $projectOrganization->proceso_desiciones = $request->proceso_desiciones;
        $projectOrganization->directrices_conflictos = $request->directrices_conflictos;
        $projectOrganization->compromisos = $request->compromisos;
        $projectOrganization->otros_acuerdos = $request->otros_acuerdos;
        $projectOrganization->aceptacion_acuerdo_persona = $request->aceptacion_acuerdo_persona;
        $projectOrganization->aceptacion_Acuerdo_firma = $request->aceptacion_Acuerdo_firma;
        $projectOrganization->save();
        return response()->json($projectOrganization);
    }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectOrganization  $projectOrganization
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectOrganization $projectOrganization)
    {
        $projectOrganization->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

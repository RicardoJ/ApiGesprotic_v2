<?php
namespace App\Http\Controllers;
use Validator;
use App\ActaConfiguracion1;
use App\Project;
use Illuminate\Http\Request;
class ActaConfiguracion1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ActaConfiguracion1::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $project_id)
    {
        $validator = Validator::make($request->all(),[
                            
                            'aprobacion_persona'=> 'required',
                            'aprobacion_firma'=> 'required',
                            
                            'nombre_rol'=> 'required',
                            'persona_asignada'=> 'required',
                            'responsabilidades'=> 'required',
                            'nivel_autoridad'=> 'required',
                            
                            'documentos'=> 'required',
                            'formato'=> 'required',
                            'acceso_rapido'=> 'required',
                            'disponibilidad_amplia'=> 'required',
                            'seguridad_acceso'=> 'required',
                            'recuperacion_informacion'=> 'required',
                            'retencion_informacion'=> 'required',
                            'codigo_item'=> 'required',
                            'nombre_item'=> 'required',
                            'categoria'=> 'required',
                            'fuente'=> 'required',
                            'formato_software1'=> 'required',
                            'formato_software2'=> 'required',
                            'gestion_del_cambio'=> 'required',
                            'contabilidad_de_estado'=> 'required',
                            'verificacion_y_auditoria'=> 'required'
                                                            ]);
        if ($validator->fails()) {
         return response()->json(['Error'],404);
              }else{
    $project=Project::findOrFail($project_id);
        if (!$project) {
            return response()->json(['No existe proyecto'],404);
        }else{
            
            $actaConfiguracion1 = $project->actaConfiguracion1;
            if ($actaConfiguracion1) {
              return response()->json(['ya tiene acta de configuracion  este proyecto'],404);
          } else {
            $actaConfiguracion1 = new ActaConfiguracion1([
                'aprobacion_persona'=>$request->input('aprobacion_persona'),
                'aprobacion_firma'=>$request->input('aprobacion_firma'),
                
                'nombre_rol'=>$request->input('nombre_rol'),
               'persona_asignada'=>$request->input('persona_asignada'),
                'responsabilidades'=>$request->input('responsabilidades'),
                'nivel_autoridad'=>$request->input('nivel_autoridad'),
                
                'documentos'=>$request->input('documentos'),
                'formato'=>$request->input('formato'),
                'acceso_rapido'=>$request->input('acceso_rapido'),
                'disponibilidad_amplia'=>$request->input('disponibilidad_amplia'),
                'seguridad_acceso'=>$request->input('seguridad_acceso'),
                'recuperacion_informacion'=>$request->input('recuperacion_informacion'),
                'retencion_informacion'=>$request->input('retencion_informacion'),
                'codigo_item'=>$request->input('codigo_item'),
                'nombre_item'=>$request->input('nombre_item'),
                'categoria'=>$request->input('categoria'),
                'fuente'=>$request->input('fuente'),
                'formato_software1'=>$request->input('formato_software1'),
                'formato_software2'=>$request->input('formato_software2'),
                'gestion_del_cambio'=>$request->input('gestion_del_cambio'),
                'contabilidad_de_estado'=>$request->input('contabilidad_de_estado'),
                'verificacion_y_auditoria'=>$request->input('verificacion_y_auditoria'),
                'project_id'=>$project_id
            ]);
            $actaConfiguracion1->save();
            return response()->json($actaConfiguracion1);
    }
}
   }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function show(ActaConfiguracion1 $actaConfiguracion1)
    {
        return response()->json($actaConfiguracion1);
    }
    public function listaActaConfiguracionPorProyecto($project_id){
        $project =Project::find($project_id);
        
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $actaConfiguracion1 = $project->actaConfiguracion1;
        return response()->json(['Acta de Configuracion del proyecto'=>$actaConfiguracion1],202);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaConfiguracion1 $actaConfiguracion1)
    {
        $validator = Validator::make($request->all(),[
            'aprobacion_persona'=> 'required',
            'aprobacion_firma'=> 'required',
            
            'nombre_rol'=> 'required',
           'persona_asignada'=> 'required',
            'responsabilidades'=> 'required',
            'nivel_autoridad'=> 'required',
            
            'documentos'=> 'required',
            'formato'=> 'required',
            'acceso_rapido'=> 'required',
            'disponibilidad_amplia'=> 'required',
            'seguridad_acceso'=> 'required',
            'recuperacion_informacion'=> 'required',
            'retencion_informacion'=> 'required',
            'codigo_item'=> 'required',
            'nombre_item'=> 'required',
            'categoria'=> 'required',
            'fuente'=> 'required',
            'formato_software1'=> 'required',
            'formato_software2'=> 'required',
            'gestion_del_cambio'=> 'required',
            'contabilidad_de_estado'=> 'required',
            'verificacion_y_auditoria'=> 'required' 
            
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $actaConfiguracion1->aprobacion_persona = $request->aprobacion_persona;
        $actaConfiguracion1->aprobacion_firma = $request->aprobacion_firma;
        $actaConfiguracion1->nombre_rol = $request->nombre_rol;
       $actaConfiguracion1->persona_asignada = $request->persona_asignada;
        $actaConfiguracion1->responsabilidades = $request->responsabilidades;
        $actaConfiguracion1->nivel_autoridad = $request->nivel_autoridad;
        $actaConfiguracion1->documentos = $request->documentos;
        $actaConfiguracion1->formato = $request->formato;
        $actaConfiguracion1->acceso_rapido = $request->acceso_rapido;
        $actaConfiguracion1->disponibilidad_amplia = $request->disponibilidad_amplia;
        $actaConfiguracion1->seguridad_acceso = $request->seguridad_acceso;
        $actaConfiguracion1->recuperacion_informacion = $request->recuperacion_informacion;
        $actaConfiguracion1->retencion_informacion = $request->retencion_informacion;
        $actaConfiguracion1->codigo_item = $request->codigo_item;
        $actaConfiguracion1->nombre_item = $request->nombre_item;
        $actaConfiguracion1->categoria = $request->categoria;
        $actaConfiguracion1->fuente = $request->fuente;
        $actaConfiguracion1->formato_software1 = $request->formato_software1;
        $actaConfiguracion1->formato_software2 = $request->formato_software2;
        $actaConfiguracion1->gestion_del_cambio = $request->gestion_del_cambio;
        $actaConfiguracion1->contabilidad_de_estado = $request->contabilidad_de_estado;
        $actaConfiguracion1->verificacion_y_auditoria = $request->verificacion_y_auditoria; 
        $actaConfiguracion1->save();
        return response()->json($actaConfiguracion1);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActaConfiguracion1 $actaConfiguracion1)
    {
        $actaConfiguracion1->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
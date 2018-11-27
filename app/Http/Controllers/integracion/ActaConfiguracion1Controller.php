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
        return response()->json(ActaConfiguracion::all());
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
         return response()->json(['Email ya existe'],404);
              }else{
    $project=Project::findOrFail($project_id);
        if (!$project) {
            return response()->json(['No existe proyecto'],404);
        }else{
            
            $actaConfiguracion = $project->actaConfiguracion;
            if ($actaConfiguracion) {
              return response()->json(['ya tiene acta de configuracion  este proyecto'],404);
          } else {
            $actaConfiguracion = new ActaConfiguracion([
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
            $actaConfiguracion->save();
            return response()->json($actaConfiguracion);


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
    public function show(ActaConfiguracion $actaConfiguracion)
    {
        return response()->json($actaConfiguracion);
    }

    public function listaActaConfiguracionPorProyecto($project_id){
        $project =Project::find($project_id);
        
        if (!$project) {
            return response()->json(['No existe el proyecto'],404);
        }
        $actaConfiguracion = $project->actaConfiguracion;
        return response()->json(['Acta de Configuracion del proyecto'=>$actaConfiguracion],202);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActaConfiguracion $actaConfiguracion)
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
        $actaConfiguracion->aprobacion_persona = $request->aprobacion_persona;
        $actaConfiguracion->aprobacion_firma = $request->aprobacion_firma;
        $actaConfiguracion->nombre_rol = $request->nombre_rol;
        $actaConfiguracion->persona_asignada = $request->persona_asignada;
        $actaConfiguracion->responsabilidades = $request->responsabilidades;
        $actaConfiguracion->nivel_autoridad = $request->nivel_autoridad;
        $actaConfiguracion->documentos = $request->documentos;
        $actaConfiguracion->formato = $request->formato;
        $actaConfiguracion->acceso_rapido = $request->acceso_rapido;
        $actaConfiguracion->disponibilidad_amplia = $request->disponibilidad_amplia;
        $actaConfiguracion->seguridad_acceso = $request->seguridad_acceso;
        $actaConfiguracion->recuperacion_informacion = $request->recuperacion_informacion;
        $actaConfiguracion->retencion_informacion = $request->retencion_informacion;
        $actaConfiguracion->codigo_item = $request->codigo_item;
        $actaConfiguracion->nombre_item = $request->nombre_item;
        $actaConfiguracion->categoria = $request->categoria;
        $actaConfiguracion->fuente = $request->fuente;
        $actaConfiguracion->formato_software1 = $request->formato_software1;
        $actaConfiguracion->formato_software2 = $request->formato_software2;
        $actaConfiguracion->gestion_del_cambio = $request->gestion_del_cambio;
        $actaConfiguracion->contabilidad_de_estado = $request->contabilidad_de_estado;
        $actaConfiguracion->verificacion_y_auditoria = $request->verificacion_y_auditoria;

        $actaConfiguracion->save();
        return response()->json($actaConfiguracion);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActaConfiguracion  $actaConfiguracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActaConfiguracion $actaConfiguracion)
    {
        $actaConfiguracion->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

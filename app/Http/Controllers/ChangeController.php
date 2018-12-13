<?php
namespace App\Http\Controllers;
use Validator;
use App\Change;
use App\Project;
use Illuminate\Http\Request;
class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Change::all());
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
            'fecha' => 'required',
            'director_persona' => 'required',
            'director_departamento' => 'required',
            'propuesta_persona' => 'required',
            'propuesta_departamento' => 'required',
            
            'check_alcance' => 'required',
            'check_costo' => 'required',
            'check_plazo' => 'required',
            'check_otro' => 'required',
            
            'descripcion_alcance' => 'required',
            'descripcion_costo' => 'required',
            'descripcion_plazo' => 'required',
            'descripcion_otro' => 'required',
            
            'check_relacionValorada' => 'required',
            'check_plano' => 'required',
            'check_Documentacionotro' => 'required',
            'documentacion_adjunta' => 'required',
            
            'check_aprueba' => 'required',
            'check_aplaza' => 'required',
            'check_rechaza' => 'required',
            'cliente' => 'required',
            
            'nombre_persona_notificada' => 'required',
            'rol' => 'required',
            'firma' => 'required',
            'Comunicacion_fecha' => 'required'
        
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $project=Project::findOrFail($project_id);
        if (!$project) {
            return response()->json(['No existe  proyecto'],404);
        }else{
        $change = new Change([
            
            'fecha'=>$request->input('fecha'),
            'director_persona'=>$request->input('director_persona'),
            'director_departamento'=>$request->input('director_departamento'),
           'propuesta_persona'=>$request->input('propuesta_persona'),
            'propuesta_departamento'=>$request->input('propuesta_departamento'),
            
            'check_alcance'=> $request->has('check_alcance') ? true : false ,
            'check_costo'=> $request->has('check_costo') ? true : false ,
            'check_plazo'=> $request->has('check_plazo') ? true : false ,
            'check_otro'=> $request->has('check_otro') ? true : false ,
            
            'descripcion_alcance'=>$request->input('descripcion_alcance'),
            'descripcion_costo'=>$request->input('descripcion_costo'),
            'descripcion_plazo'=>$request->input('descripcion_plazo'),
            'descripcion_otro'=>$request->input('descripcion_otro'),
            
            'check_relacionValorada'=> $request->has('check_relacionValorada') ? true : false ,
            'check_plano'=> $request->has('check_plano') ? true : false ,
            'check_Documentacionotro'=> $request->has('check_Documentacionotro') ? true : false ,
            'documentacion_adjunta'=>$request->input('documentacion_adjunta'),
            
            'check_aprueba'=> $request->has('check_aprueba') ? true : false ,
            'check_aplaza'=> $request->has('check_aplaza') ? true : false ,
            'check_rechaza'=> $request->has('check_rechaza') ? true : false ,
            'cliente'=>$request->input('cliente'),
            
            'nombre_persona_notificada'=>$request->input('nombre_persona_notificada'),
            'rol'=>$request->input('rol'),
            'firma'=>$request->input('firma'),
            'Comunicacion_fecha'=>$request->input('Comunicacion_fecha'), 
            'project_id'=>$project_id
        ]);
         $change->save();
        return response()->json($change);
    }
    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function show(Change $change)
    {
        return response()->json($change);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Change $change)
    {
        $validator = Validator::make($request->all(),[
            'fecha' => 'required',
            'director_persona' => 'required',
            'director_departamento' => 'required',
            'propuesta_persona' => 'required',
            'propuesta_departamento' => 'required',
            
            'check_alcance' => 'required',
            'check_costo' => 'required',
            'check_plazo' => 'required',
            'check_otro' => 'required',
            
            'descripcion_alcance' => 'required',
            'descripcion_costo' => 'required',
            'descripcion_plazo' => 'required',
            'descripcion_otro' => 'required',
            
            'check_relacionValorada' => 'required',
            'check_plano' => 'required',
            'check_Documentacionotro' => 'required',
            'documentacion_adjunta' => 'required',
            
            'check_aprueba' => 'required',
            'check_aplaza' => 'required',
            'check_rechaza' => 'required',
            'cliente' => 'required',
            
            'nombre_persona_notificada' => 'required',
            'rol' => 'required',
            'firma' => 'required',
            'Comunicacion_fecha' => 'required'
        
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $change->fecha = $request->fecha;
        $change->director_persona = $request->director_persona;
        $change->director_departamento = $request->director_departamento;
        $change->propuesta_persona = $request->propuesta_departamento;
        $change->check_alcance = $request->check_alcance;
        $change->check_costo = $request->check_costo;
        $change->check_plazo = $request->check_plazo;
        $change->check_otro = $request->check_otro;
        $change->descripcion_alcance = $request->descripcion_alcance;
        $change->descripcion_costo = $request->descripcion_costo;
        $change->descripcion_plazo = $request->descripcion_plazo;
        $change->descripcion_otro = $request->descripcion_otro;
        $change->check_relacionValorada = $request->check_relacionValorada;
        $change->check_plano = $request->check_plano;
        $change->check_Documentacionotro = $request->check_Documentacionotro;
        $change->documentacion_adjunta = $request->documentacion_adjunta;
        $change->check_aprueba = $request->check_aprueba;
        $change->check_aplaza = $request->check_aplaza;
        $change->check_rechaza = $request->check_rechaza;
        $change->cliente = $request->cliente;
        $change->nombre_persona_notificada = $request->nombre_persona_notificada;
        $change->rol = $request->rol;
        $change->firma = $request->firma;
        $change->Comunicacion_fecha = $request->Comunicacion_fecha; 
        $change->save();
        return response()->json($change);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Change  $change
     * @return \Illuminate\Http\Response
     */
    public function destroy(Change $change)
    {
        $change->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
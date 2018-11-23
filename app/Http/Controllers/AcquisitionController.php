<?php
namespace App\Http\Controllers;
use Validator;
use App\Acquisition;
use App\Provider;
use App\Project;
use Illuminate\Http\Request;
class AcquisitionController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Acquisition::all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'edicion'=>'required' ,
            'nombre_persona_responsable'=>'required',
            'alcance'=>'required' ,
            'prescripciones'=>'required',
            'cantidad'=>'required' ,
            'documentacion'=>'required',
            'documentacion_a_entregar'=>'required' ,
            'precio'=>'required',
            'plazo_final'=>'required' ,
            'informacion_a_incluir'=>'required',
            'criterio'=>'required' , 
            'otra_informacion'=>'required' 
        ]);
        
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
                $acquisition = new Acquisition([
                    'fecha' =>$request->input('fecha'),
                    'edicion'=>$request->input('edicion'),
                    'nombre_persona_responsable' =>$request->input('nombre_persona_responsable'),
                    'alcance' =>$request->input('alcance'),
                    'prescripciones' =>$request->input('prescripciones'),
                    'cantidad' =>$request->input('cantidad'),
                    'documentacion' =>$request->input('documentacion'),
                    'documentacion_a_entregar' =>$request->input('documentacion_a_entregar'),
                    'precio' =>$request->input('precio'),
                    'plazo_final' =>$request->input('plazo_final'),
                    'informacion_a_incluir' =>$request->input('informacion_a_incluir'),
                    'criterio' =>$request->input('criterio'),
                    'otra_informacion' =>$request->input('otra_informacion'),
                   
                   
                ]);
                $acquisition->save();
                return response()->json($acquisition);
            
    
}
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function show(Acquisition $acquisition)
    {
        return response()->json($acquisition);
     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Acquisition $acquisition)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acquisition $acquisition)
    {
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'edicion'=>'required' ,
            'nombre_persona_responsable'=>'required',
            'alcance'=>'required' ,
            'prescripciones'=>'required',
            'cantidad'=>'required' ,
            'documentacion'=>'required',
            'documentacion_a_entregar'=>'required' ,
            'precio'=>'required',
            'plazo_final'=>'required' ,
            'informacion_a_incluir'=>'required',
            'criterio'=>'required' , 
            'otra_informacion'=>'required' 
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);
        }else{
        $acquisition->fecha = $request->fecha;
        $acquisition->edicion = $request->edicion;
        $acquisition->nombre_persona_responsable = $request->nombre_persona_responsable;
        $acquisition->alcance = $request->alcance;
        $acquisition->prescripciones = $request->prescripciones;
        $acquisition->cantidad = $request->cantidad;
        $acquisition->documentacion = $request->documentacion;
        $acquisition->documentacion_a_entregar = $request->documentacion_a_entregar;
        $acquisition->precio = $request->precio;
        $acquisition->plazo_final = $request->plazo_final;
        $acquisition->informacion_a_incluir = $request->informacion_a_incluir;
        $acquisition->criterio = $request->criterio;
        $acquisition->otra_informacion = $request->otra_informacion;
        $acquisition->save();
        return response()->json($acquisition);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acquisition  $acquisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acquisition $acquisition)
    {
        $acquisition->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}
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
                   
                    'provider_id'=>$provider_id
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
            'descripcion' => 'required',
            'fecha_Inicial' => 'required',
            'fecha_Final' => 'required',
            'nombre' => 'required',
            'origen' => 'required',
            'relevancia'=>'required',
            'tipo'=>'required',
            'unidades'=>'required' 

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $acquisition->descripcion = $request->descripcion;
        $acquisition->fecha_Inicial = $request->fecha_Inicial;
        $acquisition->fecha_Final = $request->fecha_Final;
        $acquisition->nombre = $request->nombre;
        $acquisition->origen = $request->origen;
        $acquisition->relevancia = $request->relevancia;
        $acquisition->tipo = $request->tipo;
        $acquisition->unidades = $request->unidades;
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

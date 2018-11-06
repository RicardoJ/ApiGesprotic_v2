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
    public function store(Request $request ,$provider_id)
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
        $provider=Provider::findOrFail($provider_id);
            if (!$provider) {
                return response()->json(['No existe  proveedor'],404);
            }else{
              
                $acquisition = new Acquisition([
                    'descripcion' =>$request->input('descripcion'),
                    'fecha_Inicial'=>$request->input('fecha_Inicial'),
                    'fecha_Final' =>$request->input('fecha_Final'),
                    'nombre'=>$request->input('nombre'),
                    'origen' =>$request->input('origen'),
                    'relevancia'=>$request->input('relevancia'),
                    'tipo' =>$request->input('tipo'),
                    'unidades'=>$request->input('unidades'),
                    'provider_id'=>$provider_id
                ]);
                $acquisition->save();
                return response()->json($acquisition);

                }
    
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

<?php

namespace App\Http\Controllers;
use Validator;
use App\Agreement;
use App\Provider;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Agreement::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $provider_id)
    {
        $validator = Validator::make($request->all(),[
            'lugar'=> 'required',
            'nit' => 'required', //entero
            'fecha' => 'required', //date
            'lugar_domicilio' => 'required',
            'monto' => 'required',
            'domicilio_proveedor' => 'required',
            'tipo_adquisicion' => 'required',
            'tiempo_contrato' => 'required',
            'nombre_Empresa' => 'required',
            'nombre_proveedor' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $provider=Provider::findOrFail($provider_id);
        if (!$provider) {
            return response()->json(['No existe proveedor'],404);
        }else{
            $agreement = $provider->agreement;
            if ($agreement) {
                return response()->json(['ya tiene contrato este proveedor'],404);
            } else {
                $agreement = new Agreement([
                'lugar' =>$request->input('lugar'),
                'nit'=>$request->input('nit'),
                'fecha'=>$request->input('fecha'),
                'lugar_domicilio'=>$request->input('lugar_domicilio'),
                'monto'=>$request->input('monto'),
                'domicilio_proveedor'=>$request->input('domicilio_proveedor'),
                'tipo_adquisicion'=>$request->input('tipo_adquisicion'),
                'tiempo_contrato'=>$request->input('tiempo_contrato'),
                'nombre_Empresa'=>$request->input('nombre_Empresa'),
                'nombre_proveedor'=>$request->input('nombre_proveedor'),
                'provider_id'=>$provider_id
            ]);
            $agreement->save();
            return response()->json($agreement);

                }
            }

        }
        /*
        $agreement->create(
        $request->only(['contenido', 'fecha_Entrega', 'fecha_Contrato','fecha_Contrato','metodo_pago','nombre_Empresa','persona_Encargada'])
        );
        return response()->json($agreement); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
        return response()->json($agreement);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        $validator = Validator::make($request->all(),[
            'lugar'=> 'required',
            'nit' => 'required', //entero
            'fecha' => 'required', //date
            'lugar_domicilio' => 'required',
            'monto' => 'required',
            'domicilio_proveedor' => 'required',
            'tipo_adquisicion' => 'required',
            'tiempo_contrato' => 'required',
            'nombre_Empresa' => 'required',
            'nombre_proveedor' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $agreement->lugar = $request->lugar;
        $agreement->nit = $request->nit;
        $agreement->fecha = $request->fecha;
        $agreement->lugar_domicilio = $request->lugar_domicilio;
        $agreement->monto = $request->monto;
        $agreement->domicilio_proveedor = $request->domicilio_proveedor;
        $agreement->tipo_adquisicion = $request->tipo_adquisicion;
        $agreement->tiempo_contrato = $request->tiempo_contrato;
        $agreement->nombre_Empresa = $request->nombre_Empresa;
        $agreement->nombre_proveedor = $request->nombre_proveedor;
        $agreement->save();
        return response()->json($agreement);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agreement $agreement)
    {
        $agreement->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

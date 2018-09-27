<?php

namespace App\Http\Controllers;

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
        $this->validate($request, [
            'contenido' => 'required',
            'fecha_Entrega' => 'required',
            'fecha_Contrato' => 'required',
            'metodo_Pago' => 'required',
            'nombre_Empresa' => 'required',
            'persona_Encargada' => 'required'
        ]);

        $provider=Provider::find($provider_id);
        if (!$provider) {
            return response()->json(['No existe proveedor'],404);
        }else{
            $agreement = $provider->agreement;
            if ($agreement) {
                return response()->json(['ya tiene contrato este proveedor'],404);
            } else {
                $agreement = new Agreement([
                'contenido' =>$request->input('contenido'),
                'fecha_Entrega'=>$request->input('fecha_Entrega'),
                'fecha_Contrato'=>$request->input('fecha_Contrato'),
                'metodo_Pago'=>$request->input('metodo_Pago'),
                'nombre_Empresa'=>$request->input('nombre_Empresa'),
                'persona_Encargada'=>$request->input('persona_Encargada'),
                'provider_id'=>$provider_id
            ]);
            $agreement->save();
            return response()->json($agreement);

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
        $this->validate($request, [
            'contenido' => 'required',
            'fecha_Entrega' => 'required|date',
            'fecha_Contrato' => 'required|date',
            'metodo_Pago' => 'required',
            'nombre_Empresa' => 'required',
            'persona_Encargada' => 'required'
        ]);
        $agreement->contenido = $request->contenido;
        $agreement->fecha_Entrega = $request->fecha_Entrega;
        $agreement->fecha_Contrato = $request->fecha_Contrato;
        $agreement->metodo_Pago = $request->metodo_Pago;
        $agreement->nombre_Empresa = $request->nombre_Empresa;
        $agreement->persona_Encargada = $request->persona_Encargada;
        $agreement->save();
        return response()->json($agreement);
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

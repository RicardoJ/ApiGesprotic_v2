<?php

namespace App\Http\Controllers\adquisiciones;
use Validator;
use App\ad\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Provider::all());
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
            'nombre' => 'required',
            'nombre_empresa' => 'required',
          
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo_de_servicio' => 'required',
            'nit_o_cc' => 'required', 
            'email' => 'required|unique:provider,email' 

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $provider = new Provider([
            'nombre' => $request->input('nombre'),
            'nombre_empresa' => $request->input('nombre_empresa'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'tipo_de_servicio' => $request->input('tipo_de_servicio'),
            'nit_o_cc' => $request->input('nit_o_cc'),
            'email' => $request->input('email')
        ]);
        $provider->save();
        return response()->json(['success' => $provider]);
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return response()->json($provider);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'nombre_empresa' => 'required',
          
            'telefono' => 'required',
            'direccion' => 'required',
            'tipo_de_servicio' => 'required',
            'nit_o_cc' => 'required',
           
            'email' => 'required|unique:provider,email,'.$provider->id
        ]);
            if ($validator->fails()) {
                return response()->json(['Error'],404);
    
            }else{
        $provider->nombre = $request->nombre;
        $provider->nombre_empresa = $request->nombre_empresa;
        $provider->telefono = $request->telefono;
        $provider->direccion = $request->direccion;
        $provider->tipo_de_servicio = $request->tipo_de_servicio;
        $provider->nit_o_cc = $request->nit_o_cc;
        $provider->email = $request->email;
        $provider->save();
        return response()->json($provider);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->json(['success' => 'borrado correctamente']);
    }
}

<?php

namespace App\Http\Controllers;
use Validator;
use App\Provider;
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
            'empresa' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:provider,email' 

        ]);
        if ($validator->fails()) {
            return response()->json(['Error'],404);

        }else{
        $provider = new Provider([
            'empresa' => $request->input('empresa'),
            'contacto' => $request->input('contacto'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
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
            'empresa' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'email' => 'required|unique:provider,email,'.$provider->id
        ]);
            if ($validator->fails()) {
                return response()->json(['Error'],404);
    
            }else{
        $provider->empresa = $request->empresa;
        $provider->contacto = $request->contacto;
        $provider->telefono = $request->telefono;
        $provider->direccion = $request->direccion;
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

<?php

namespace App\Http\Controllers;

use App\Models\GrupoAtributo;
use Illuminate\Http\Request;

class GrupoAtributoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grupoatributo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grupoatributo()
    {
        return GrupoAtributo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupoatributo = new GrupoAtributo();
        $grupoatributo->grupo = $request->grupo;
        $grupoatributo->orden = $request->orden;
        $grupoatributo->estado = '1';
        $grupoatributo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrupoAtributo  $grupoAtributo
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoAtributo $grupoAtributo)
    {
        return $grupoAtributo->atributos;

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrupoAtributo  $grupoAtributo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $grupoatributo = GrupoAtributo::findOrFail($id);
        $grupoatributo->grupo = $request->grupo;
        $grupoatributo->orden = $request->orden;
        $grupoatributo->estado = '1';
        $grupoatributo->save(); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrupoAtributo  $grupoAtributo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GrupoAtributo::findOrFail($id)->delete();
    }
}

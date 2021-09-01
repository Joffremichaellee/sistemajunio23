<?php

namespace App\Http\Controllers;

use App\Models\Atributo;
use Illuminate\Http\Request;

class AtributoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Atributo $atributo,$id)
    {
        
        return view('atributo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function atributo()
    {
        return  Atributo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atributo = new Atributo();
        $atributo->atributo = $request->atributo;
        $atributo->orden = $request->orden;
        $atributo->gruposatributo_id= $request->gruposatributo_id;
        $atributo->estado = '1';
        $atributo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function show(Atributo $atributo)
    {
        return $atributo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function edit(Atributo $atributo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atributo $atributo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atributo  $atributo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atributo $atributo)
    {
        //
    }
}

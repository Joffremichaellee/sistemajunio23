<?php

namespace App\Http\Controllers;
use App\Models\Um;
use Illuminate\Http\Request;

class UmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $ums =  Um::all();

        return view('um.index', compact('ums'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('um.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $um = new Um;
        $um->nombre = $request->input('nombre');
        $um->simbolo = $request->input('simbolo');
        $um->save(); 

        return redirect()->route('ums.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($um)
    {
        
        $um = Um::findOrfail($um);

        return view('um.edit', compact('um'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $um)
    {
        $um = Um::findOrFail($request->um);

        $um->update($request->only('nombre','simbolo'));

        return redirect()->route('ums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($um)
    {
        Um::findOrFail($um)->delete();

        return redirect()->route('ums.index');
    }
}

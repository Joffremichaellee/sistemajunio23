<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;

use App\Models\Categoria;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categoria $categoria)
        {
            
            $categorias =  Categoria::all();

            return view('categoria.index', compact('categorias'));
                    
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Categoria $categoria)
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            
            'imagen' => 'required|image|max:2048',

        ]);


        $imagen =  $request->file('imagen')->store('public');



        Categoria::Create([
            'nombre' => $request->nombre,
            'image' => Storage::url($imagen),
            'descripcion' => $request->descripcion
            
        ]);

        return redirect()->route('categorias.index');

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
    public function edit($id)
    {
        $categoria = Categoria::findOrfail($id);

        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        
        $categoria = Categoria::findOrFail($id);

        if ($request->hasFile('imagen')) 
        {

            $imagen = $request->file('imagen')->store('public');
            $categoria->image = Storage::url($imagen);
           
            
            
        }

        $categoria->update($request->only('nombre','descripcion'));

        return redirect()->route('categoriaindex');

        //dd($request->file('image'));

        //$categoria->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();

        $categoria->delete();

        /*$imagePath = str_replace('storage', 'public', $image->image);

        Storage::delete($image->image); */

        return redirect()->route('categoriaindex');

    }
}

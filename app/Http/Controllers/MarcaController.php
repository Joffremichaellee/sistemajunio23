<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marca.index');
        //return Marca::All();

        //$marcas =  Marca::all();

       

    }

    public function marca()
    {
        //return view('marca.index');

        return  Marca::all();

        /*return [

            'marca' => $marca
            
        ];*/
        
        

        

       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
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
            
            'image' => 'required|image|max:2048',

        ]);
      
        $asd =  $request->file('image')->store('public');

        return Marca::Create([
            'marca' => $request->marca,
            'logo' => Storage::url($asd),
            'fabricante' => $request->fabricante
            
        ]);

       /* $marcas = new Marca();
        $marcas->marca = $request->marca;
        $marcas->fabricante = $request->fabricante;
        $marcas->image = Storage::url($asd);
        $marcas->save();*/
        
        
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
        $marca = Marca::findOrfail($id);

        return view('marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

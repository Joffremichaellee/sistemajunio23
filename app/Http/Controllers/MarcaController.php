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
      
        $image = $request->file('image')->store('public');

        return Marca::Create([
            'marca' => $request->marca,
            'logo' => Storage::url($image),
            'fabricante' => $request->fabricante
            
        ]);

       /* $marcas = new Marca();
        $marcas->marca = $request->marca;
        $marcas->fabricante = $request->fabricante;
        $marcas->image = Storage::url($image);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd($request->file('logo'));

        
        $marca = Marca::findOrFail($id);

        if ($request->hasFile('image')) 
        {

            $image = $request->file('image')->store('public');
            $marca->logo  = Storage::url($image);
           
            
            
        }

        

        $marca->update($request->only('marca','fabricante'));
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marca::findOrFail($id)->delete();



    }
}

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
    public function index(Request $request)
        {
            
            $categorias =  Categoria::all();

            return view('vistas.categoria', compact('categorias'));
                    
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vistas.nuevaCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);*/

        $request->validate([
            
            'image' => 'required|image|max:2048',

        ]);

        
        /*$image = request()->file('image');

        $imageName = $image->getClientOriginalName();
        $imageName = time().'_'.$imageName;

        $image->move(public_path('/images'), $imageName);*/

        $image =  $request->file('image')->store('public');


        

        //quitando esto ejecuta y guarda la img
        /*$img = new Categoria;
        $img->image = 'images/'.$imageName;
        $img->save();*/

        /*$request->validate([
            
            'image' => 'image|max:2048',

        ]);*/

        //return $request->file('file')->store('public');

       /* $imagen = $request->image;

        if ($imagen != '') {
            $image = '';

            $url = '';
        }else{

            $image =  $request->file('image')->store('public');

            $url = Storage::url($image);
        }*/

       

        return Categoria::Create([
            'nombre' => $request->nombre,
            //'image' => 'images/'.$imageName,
            'image' => Storage::url($image),
            'descripcion' => $request->descripcion
            
        ]);

        
        //$categoria = new Categoria();
        //$categoria->nombre = $request->nombre;
        //$categoria->save();

        /*DB::table('categorias')->insert([
            "nombre" => $request->input('nombre'),
        ]);*/

        //return redirect()->action('CategoriaController@index');
        //return redirect()->route('categoriaindex');

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

        return view('vistas.categoriaedit', compact('categoria'));
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

        
        $categoria = Categoria::findOrFail($id);

        if ($request->hasFile('image')) 
        {

            $image = $request->file('image')->store('public');
            $categoria->image  = Storage::url($image);
           
            
            
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

        $imagePath = str_replace('storage', 'public', $image->image);

        Storage::delete($image->image); 

        return redirect()->route('categoriaindex');

    }
}

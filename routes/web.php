<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'inicio', function () {
    return view('contenido/contenido');
}]);



/*===============  CATEGORIAS  ==============*/
Route::get('/categoria',['as'=>'categoriaindex','uses'=> 'CategoriaController@index']);

//Route::resource('categorias','CategoriaController');

Route::get('/categoria/nuevacategoria',['as'=>'createcategoria','uses'=> 'CategoriaController@create']);
Route::post('/categoria/storecategoria', 'CategoriaController@store');
Route::get('/categoria/{id}/edit', 'CategoriaController@edit')->name('categoria.edit');
Route::put('/categoria/{id}', 'CategoriaController@update')->name('categoria.update');
Route::delete('/categoria/{id}', 'CategoriaController@destroy')->name('categoria.destroy');



/*===============  HOME  ==============*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/*===============  UMS  ==============*/

Route::resource('ums','UmController');



/*===============  PRODUCTOS  ==============*/

//Route::resource('productos','ProductoController'); 

Route::resource('productos','ProductoController');



/*===============  MARCAS  ==============*/

Route::apiResource('marcas','MarcaController')->parameters(['marcas'=>'id']); 
Route::get('/marca', 'MarcaController@marca');



/*===============  GRUPOATRIBUTOS  ==============*/

Route::apiResource('grupoatributos','GrupoAtributoController')->parameters(['grupoatributos'=>'id']);
Route::get('/grupoatributo', 'GrupoAtributoController@grupoatributo');



/*===============  ATRIBUTOS  ==============*/
//Route::Resource('grupoatributos/atributos','AtributoController')->parameters(['atributos'=>'id']);
Route::get('/grupoatributos/atributos/{id}', 'AtributoController@index');
Route::post('/grupoatributos/atributos/{id}/{atributo}', 'AtributoController@store');
Route::get('/grupoatributos/atributos/{id}/{atributo}', 'AtributoController@edit')->name('categoria.edit');
Route::put('/grupoatributos/atributos/{id}/{atributo}', 'AtributoController@update')->name('categoria.update');
Route::delete('/grupoatributos/atributos/{id}/{atributo}', 'AtributoController@destroy')->name('categoria.destroy');

Route::get('/atributo', 'AtributoController@atributo');

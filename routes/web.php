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
//Route::get('/categorias', 'CategoriaController@index');

/*===============  UNIDADES DE MEDIDAS  ==============*/

//Route::get('/um',['as'=>'unidadmedida','uses'=> 'CategoriaController@index']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('ums','UmController');

//Route::resource('productos','ProductoController'); 




//Route::resource('marcas','MarcaController');
Route::get('/marcas', 'MarcaController@index')->name('marcas.index');
Route::get('/marca', 'MarcaController@marca');
Route::get('/marcas/{marca}/edit', 'MarcaController@edit')->name('marcas.edit');
Route::put('/marcas/{marca}', 'MarcaController@update')->name('marcas.update');
Route::delete('/marcas/{marca}', 'MarcaController@destroy')->name('marcas.destroy');
/*Route::get('/marcas', 'MarcaController@index')->name('marcas.index');
Route::get('/marcas/create', 'MarcaController@create')->name('marcas.create');
Route::post('/marcas', 'MarcaController@store');*/
//Route::get('/marcas/{id}/edit', 'MarcaController@edit')->name('marcas.edit');
//Route::put('/marcas/{id}', 'MarcaController@update')->name('marcas.update');
//Route::delete('/marcas/{id}', 'MarcaController@destroy')->name('marcas.destroy');


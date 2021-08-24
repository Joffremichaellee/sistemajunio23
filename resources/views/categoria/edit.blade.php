@extends('contenido.contenido')

    @section('contenido')
    <main>
            <!-- Breadcrumb -->
            <div class="container-fluid">

                <div class="card">     
                   
                        <div class=" card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Editar Unidad de Medida</h3>
                            </div>

                            <div class="row">
                
                                <div class="col-md-6">

                                    <div class="card-body">
    
                                        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" >
                                            {!! method_field('PUT') !!}
                                            @csrf
                                                                                
                                            <div  class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" id="nombre" value="{{$categoria->nombre}}" name="nombre" style="border-radius:0;" class="form-control" placeholder="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion" >descripcion</label>
                                                <input type="text" id="descripcion" value="{{$categoria->descripcion}}" name="descripcion"  style="border-radius:0;" class="form-control" placeholder="descripcion">
                                            </div>

                                            <div class="form-group">

                                                <label for="imagen">imagen(100x100)</label>
                                                
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file" name="imagen" src="{{$categoria->image}}"  id="imagen" >
                                                        <!--<label class="custom-file-label"  style="border-radius:0;" for="imagen">Imagen</label>-->
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <br>
                                            

                                            <!--<figure>
                                                <img width="230" height="200" id="imagenMiniatura" src="{{$categoria->image}}" alt="Foto de la categoria">
                                            </figure>-->

                                            <div class="form-group row">

                                                <div class="col-md-12">
                                                    <a type="button"  style="border-radius:0;" href="{{ route('categorias.index') }}" class="btn btn-secondary">Cerrar</a>
                                                    <button id="button" type="submit"  style="border-radius:0;" class="btn btn-primary"  >Registrar Venta</button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                
                                </div>

                            </div>
                        
                        </div>
                    

                </div>

            </div>

    </main>
    @endsection
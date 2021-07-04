@extends('contenido.contenido')

    @section('contenido')
    <main>
            <!-- Breadcrumb -->
            <div class="container-fluid">

                <div class="card">     
                   
                        <div class=" card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Nueva Categoria</h3>
                            </div>

                            <div class="row">
                
                                <div class="col-md-6">

                                    <div class="card-body">
    
                                        <form method="POST" action="{{ route('categoria.update', $categoria->id) }}" enctype="multipart/form-data" >
                                            {!! method_field('PUT') !!}
                                            @csrf
                                                                                
                                            <div  class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" id="nombre" value="{{$categoria->nombre}}" name="nombre" style="border-radius:0;" class="form-control" placeholder="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion" >descripcion</label>
                                                <input type="text" style="border-radius:0;" value="{{$categoria->descripcion}}" name="descripcion" class="form-control" placeholder="descripcion">
                                            </div>

                                            <div class="form-group">

                                                <label for="imagen">Imagen(100x100)</label>
                                                
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="image" accept="image/png, image/jpeg">
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>

                                          
                                            <img width="230" height="200" id="imagenMiniatura" src="{{$categoria->image}}" alt="Foto de la Categoria">
                                            

                                        
                                            <br><br>
                                            

                                            <!--<figure>
                                                <img width="230" height="200" id="imagenMiniatura" src="{{$categoria->image}}" alt="Foto de la Categoria">
                                            </figure>-->

                                            <div class="form-group row">

                                                <div class="col-md-12">
                                                    <a type="button"  style="border-radius:0;" href="/categoria" class="btn btn-secondary">Cerrar</a>
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
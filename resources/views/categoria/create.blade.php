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

                                            <form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <div  class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" name="nombre" id="nombre"   style="border-radius:0;" class="form-control" placeholder="name">
                                                </div>


                                                <div class="form-group">
                                                    <label for="descripcion" >descripcion</label>
                                                    <input type="text" name="descripcion" id="descripcion" style="border-radius:0;" class="form-control" placeholder="descripcion">
                                                </div>

                                                <div class="form-group">

                                                    <label for="imagen">imagen(100x100)</label>
                                                    
                                                    <div class="input-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="imagen"  id="imagen">
                                                            <!--<label class="custom-file-label"  style="border-radius:0;" for="imagen">Imagen</label>-->
                                                        </div>

                                                    </div>
                                                    
                                                </div>

                                                <div id="preview"></div>

                                                <div class="form-group row">

                                                    <div class="col-md-12">
                                                        <a type="button"  style="border-radius:0;" href="{{ route('categorias.index') }}" class="btn btn-secondary">Cerrar</a>
                                                        <button id="button" type="submit"  style="border-radius:0;" class="btn btn-primary"  >Registrar Categoria</button>
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

    
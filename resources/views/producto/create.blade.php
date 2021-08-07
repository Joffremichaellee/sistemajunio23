@extends('contenido.contenido')

    @section('contenido')

    
        <main>

                <div class="row">
                    <!-- Breadcrumb -->
                    <div class="col-md-6">

                        <div class="card ">     
                        
                                <div class=" card-primary">

                                    <div class="card-header">
                                        <h3 class="card-title">Nueva Producto</h3>
                                    </div>

                                    <div class="row">
                        
                                        <div class="col-md-12">

                                            <div class="card-body">

                                                <form method="POST" action="{{ route('productos.store') }}">
                                                    {!! csrf_field() !!}
                                                    <div  class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" name="nombre" id="nombre"   style="border-radius:0;" class="form-control" placeholder="name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="modelo">Modelo</label>
                                                        <input type="text" name="modelo" id="modelo" style="border-radius:0;" class="form-control" placeholder="modelo">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="temporada">Temporada</label>
                                                        <select class="form-control">
                                                            <option>Todo</option>
                                                            <option>Verano</option>
                                                            <option>Invierno</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="temporada">Categoria</label>
                                                        <select class="form-control">
                                                            <option>ropa</option>
                                                            <option>camisa</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="temporada">Marca</label>
                                                        <select class="form-control">
                                                            <option>coca cola</option>
                                                            <option>bonaroti</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="temporada">Unidad de Medida</label>
                                                        <select class="form-control">
                                                            <option>u</option>
                                                            <option>dc</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group row">

                                                        <div class="col-md-12">
                                                            <a type="button"  style="border-radius:0;" href="{{ route('productos.index') }}" class="btn btn-secondary">Cerrar</a>
                                                            <button id="button" type="submit"  style="border-radius:0;" class="btn btn-primary"  >Registrar</button>
                                                        </div>

                                                    </div>

                                                </form>

                                            </div>
                                            
                                        </div>

                                    </div>
                                
                                </div>
                            

                        </div>

                    </div>

                    <div class="col-md-6" style="display:flex">

                        <div class="card ">     
                        
                                <div class=" card-secondary">

                                    <div class="card-header">
                                        <h3 class="card-title">Tallas y colores</h3>
                                    </div>

                                    <div class="row">
                        
                                        <div class="col-md-12">

                                            <div class="card-body">

                                                <form method="POST" action="{{ route('productos.store') }}">
                                                    {!! csrf_field() !!}
                                                    <div  class="form-group">

                                                        <!-- /.card-header -->
                                                        
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Tallas</label>
                                                                    <select class="duallistbox" multiple="multiple">
                                                                        <option>S</option>
                                                                        <option>M</option>
                                                                        <option>L</option>
                                                                        <option>X</option>
                                                                        <option>XL</option>
                                                                        <option>XXL</option>
                                                                    </select>
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>

                                                    <div  class="form-group">
                                                       
                                                        <!-- /.card-header -->
                                                        
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Colores</label>
                                                                    <select class="duallistbox" multiple="multiple">
                                                                        <option>Blanco</option>
                                                                        <option>Rojo</option>
                                                                        <option>Beish</option>
                                                                    </select>
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>

                                                </form>

                                            </div>
                                            
                                        </div>

                                    </div>
                                
                                </div>
                            

                        </div>

                    </div>

                </div>

        </main>


    @endsection
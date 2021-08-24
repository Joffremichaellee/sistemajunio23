@extends('contenido.contenido')

    @section('contenido')

    <div class="card-header" style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
        <a href="{{route('categorias.create')}}" type="button" class="btn btn-success button-registrar" style="border-radius:0;">
            <i class="icon-plus"></i>Nueva Categoria
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

       

    </div>



    <div class="card">
        <div class="card-header" style="background-color: #F7F7F7;">
            <h3 class="card-title" style="font-family: 'Roboto', sans-serif;">Lista de Categoria</h3>
        </div>
              
        <!-- /.card-header -->
        <div class="card-body" >
        <table id="example1" class="table  table-striped table-hover" >
            <thead style="font-family: 'Georama', sans-serif;">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($categorias as $categoria)

                    <tr>
                        <td class="circular-image" style="width:10%;"><img src="{{ $categoria->image }}"></td>
                        
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            @if($categoria->estado === 1)
                                <div>
                                    <span class="badge badge-success">Activo</span>
                                </div>
                            @else($categoria->estado)
                                <div>
                                    <span class="badge badge-danger">Desactivado</span>
                                </div>
                            @endif
                        </td>
                        <td class="widthOpciones">
                            
                            <a href="{{ route('categorias.edit', $categoria->id) }}" type="button" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt" style="color:#fff"></i>
                            </a> &nbsp;
                            <form method="POST" style="display:inline" action="{{ route('categorias.destroy', $categoria->id) }}">
                                
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times-circle" style="color:#fff"></i>
                                </button> &nbsp;

                            </form>
                            
                        </td>
                        
                    </tr>

                @endforeach 

            </tbody>

        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @endsection
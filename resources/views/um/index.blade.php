@extends('contenido.contenido')

    @section('contenido')

    <div class="card-header" style="padding: 0px 0px 18px; font-family: 'Rubik', sans-serif;">
        <a href="{{ route('ums.create') }}" type="button" class="btn btn-success button-registrar" style="border-radius:0;">
            <i class="icon-plus"></i>Nueva Unidad de medida
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <button type="button" class="btn btn-warning button-importar" style="border-radius:0;">
            <i class="icon-plus"></i>CSV Importar
        </button>

        <button type="button" class="btn btn-outline-warning button-exportar" style="border-radius:0;">
            <i class="icon-plus"></i>CSV Exportar
        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <button type="button" class="btn btn-danger button-reportar"  style="border-radius:0;">
            <i class="icon-plus"></i>Reportes
        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    </div>



    <div class="card">
        <div class="card-header" style="background-color: #F7F7F7;">
            <h3 class="card-title" style="font-family: 'Roboto', sans-serif;">Lista de Unidades de medida</h3>
        </div>
              
        <!-- /.card-header -->
        <div class="card-body" style="font-family: 'Rubik', sans-serif;">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Simbolo</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($ums as $um)

                    <tr>
                        <td>{{ $um->id }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye" style="color:#fff"></i>
                            </button> &nbsp;
                            <a href="{{ route('ums.edit', $um->id) }}" type="button" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt" style="color:#fff"></i>
                            </a> &nbsp;
                            <form method="POST" style="display:inline" action="{{ route('ums.destroy', $um->id) }}">
                                
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times-circle" style="color:#fff"></i>
                                </button> &nbsp;

                            </form>
                            
                        </td>
                        <td>{{ $um->nombre }}</td>
                        <td>{{ $um->simbolo }}</td>
                       
                        
                    </tr>

                @endforeach 

            </tbody>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Simbolo</th>
            </tr>
            </tfoot>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @endsection
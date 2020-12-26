@extends('adminlte::page')
@section('title', 'Editar Sucursal')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Editar sucursal </h1>
@stop

@section('content')
@if (Auth::check())
    <a href="{{route('proveedores.index')}}" class="btn btn-dark mb-2" data-dismiss="modal">Regresar</a>

    
        <div class="card col-md-12">
            <div class="card-header text-center">
                <strong class="">Modifica el proveedor {{$provee->nombre}}</strong>
            </div>

                <form action="{{route('proveedores.update', $provee->id)}}" method="POST">
                    <div class="card-body row">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-md-4">
                            <label>Nombre:</label>
                            <input name="nombre" type="text" class="form-control"  value="{{$provee->nombre}}" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Categoria:</label>
                            <select class="form-control" name="id_categoria" required>
                                <option value="{{old('id_categoria',$provee->categoria->id)}}">{{old('id_categoria',$provee->categoria->categoria)}}</option>
                                @foreach ($categoria as $cat)
                                    <option value="{{$cat->id}}">{{$cat->categoria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Producto:</label>
                            <input type="text"  name="producto" value="{{$provee->producto}}" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="{{$provee->telefono}}" class="form-control" placeholder="Escribe el email">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Empresa:</label>
                            <select class="form-control" name="id_empresa" required readonly="">
                                <option value="{{old('id_empresa',$provee->empresa->id)}}">{{old('id_empresa',$provee->empresa->nombre)}}</option>
                                
                            </select>
                            
                        </div>
                    </div>

                    </div>
                    
                    <div class="card-footer row">
                        <div class="col-md-5"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Modificar</button>
                        </div>
                                                
                    </div>
                </form>
            
        </div>
@endif
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>

        
    @if (session('success')) 
        <script>
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

@stop
@extends('adminlte::page')
@section('title', 'Editar Sucursal')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Editar sucursal </h1>
@stop

@section('content')
    @if (Auth::check())
        <a href="{{route('bodega.index')}}" class="btn btn-dark mb-2" data-dismiss="modal">Regresar</a>

        
            <div class="card col-md-12">
                <div class="card-header text-center">
                    <strong class="">Modifica el producto {{$bodega->producto}}</strong>
                </div>
                
                    <form action="{{route('bodega.update', $bodega->id)}}" method="POST">
                        
                        <div class="card-body row">
                            @method('PATCH')
                            @csrf
                            <div class="form-group col-md-6">
                                <label>Codigo:</label>
                                <input type="number" name="codigo" min="0" value="{{$bodega->codigo}}" readonly class="form-control" ">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Categoria:</label>
                                <select name="id_categoria" class="form-control">
                                    <option value="{{$bodega->categoria->id}}">{{$bodega->categoria->categoria}}</option>
                                    @foreach ($categoria as $ca)
                                        <option value="{{$ca->id}}">{{$ca->categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Producto:</label>
                                <input type="text"  name="producto" value="{{$bodega->producto}}" class="form-control" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cantidad:</label>
                                <input type="number" name="cantidad" min="0" value="{{$bodega->cantidad}}" class="form-control" ">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Valor por unidad:</label>
                                <input type="number" name="valor_und" min="0" value="{{$bodega->valor_und}}" class="form-control" ">
                            </div>
                            <div class="form-group col-md-6">
                                <label>IVA:</label>
                                <input type="number" name="iva" min="0" value="{{$bodega->iva}}" class="form-control" ">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha de vencimiento:</label>
                                <input type="date" name="fecha_vencimiento" value="{{$bodega->fecha_vencimiento}}" class="form-control" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fecha:</label>
                                <input type="date" name="fecha" value="{{$bodega->fecha}}" class="form-control" >
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
@extends('adminlte::page')
@section('title', 'Editar Sucursal')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Editar sucursal </h1>
@stop

@section('content')
    <a href="{{route('sucursales.index')}}" class="btn btn-dark mb-2" data-dismiss="modal">Regresar</a>

    
        <div class="card col-md-12">
            <div class="card-header text-center">
                <strong class="">Modifica la Sucursal {{$sucursal->nombre}}</strong>
            </div>

                <form action="{{route('sucursales.update', $sucursal->id)}}" method="POST">

                    <div class="card-body row">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Nit:</label>
                            <input name="nit_sucursal" type="number" min="0" class="form-control" value="{{old('nit_sucursal',$sucursal->nit_sucursal)}}" readonly>
                        </div>
                        @error('nit')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{old('nombre',$sucursal->nombre)}}">
                        </div>
                        @error('nombre')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="{{old('telefono',$sucursal->telefono)}}" class="form-control" >
                        </div>
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Email:</label>
                            <input type="email" name="email" value="{{old('email',$sucursal->email)}}" class="form-control" readonly>
                        </div>
                        @error('email')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Departamento:</label>
                            <select class="form-control" name="id_departamento" required>
                                <option value="{{old('id_departamento',$sucursal->departamento->id)}}">{{old('id_departamento',$sucursal->departamento->departamento)}}</option>
                                @foreach ($departamento as $depar)
                                    <option value="{{$depar->id}}">{{$depar->departamento}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_departamento')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror

                        <div class="form-group col-md-4 col-sm-2">
                            <label>Ciudad:</label>
                            <select class="form-control" name="id_ciudad"  required>
                                <option value="{{old('id_ciudad',$sucursal->ciudad->id)}}">{{old('id_ciudad',$sucursal->ciudad->ciudad)}}</option>
                                @foreach ($ciudad as $ciud)
                                    <option value="{{$ciud->id}}">{{$ciud->ciudad}}</option>
                                @endforeach
                            </select> 
                        </div>
                        @error('id_ciudad')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror

                        <div class="form-group col-md-4 col-sm-2">
                            <label>Empresa:</label>
                            <input type="text" name="id_empresa" value="{{old('id_empresa',$sucursal->empresa->nombre)}}" class="form-control" readonly>    
                        </div>

                        <div class="form-group col-md-4 col-sm-2">
                            <label>Responsable:</label>
                            <select class="form-control" name="id_usuario" required>
                                <option value="{{old('id_usuario',$sucursal->usuario->id)}}">{{old('id_ciudad',$sucursal->usuario->name)}}</option>
                                @foreach ($respon as $res)
                                    <option value="{{$res->id}}">{{$res->name}}</option>
                                @endforeach
                            </select> 
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
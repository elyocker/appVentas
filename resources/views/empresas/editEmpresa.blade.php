@extends('adminlte::page')
@section('title', 'Editar Empresas')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Editar Empresa</h1>
@stop

@section('content')
    <a href="{{route('empresas.index')}}" class="btn btn-dark mb-2" data-dismiss="modal">Regresar</a>

    
        <div class="card col-md-12">
            <div class="card-header text-center">
                <strong class="">Modifica la empresa {{$editEmpresa->nombre}}</strong>
            </div>

                <form action="{{route('empresas.update', $editEmpresa->id)}}" method="POST">

                    <div class="card-body row">
                        @method('PATCH')
                        @csrf
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Nit:</label>
                            <input name="nit" type="number" min="0" class="form-control" value="{{old('nit',$editEmpresa->nit)}}" readonly>
                        </div>
                        @error('nit')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{old('nombre',$editEmpresa->nombre)}}">
                        </div>
                        @error('nombre')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="{{old('telefono',$editEmpresa->telefono)}}" class="form-control" >
                        </div>
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Email:</label>
                            <input type="email" name="email" value="{{old('email',$editEmpresa->email)}}" class="form-control" readonly>
                        </div>
                        @error('email')
                            <div class="alert alert-warning col-sm-2">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="form-group col-md-4 col-sm-2">
                            <label>Departamento:</label>
                            <select class="form-control" name="id_departamento" required>
                                <option value="{{old('id_departamento',$editEmpresa->departamento->id)}}">{{old('id_departamento',$editEmpresa->departamento->departamento)}}</option>
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
                                <option value="{{old('id_ciudad',$editEmpresa->ciudad->id)}}">{{old('id_ciudad',$editEmpresa->ciudad->ciudad)}}</option>
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
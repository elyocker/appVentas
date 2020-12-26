@extends('adminlte::page')

@section('title', 'Empresas')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Empresas</h1>
@stop

@section('content')
    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#agregarEmpresa">Agregar Empresa</button>
    <div class="card">
        <div class="card-header text-center "><strong>Empresas Registradas</strong></div>
        <div class="card-body">

            <table class="table text-center table-hover">
                <thead class="thead-dark ">
                  <tr class="center">
                    <th scope="col">Nit</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Acciones</th>
                    <th scope="col">Admin</th>
                  </tr>
                </thead>
                <tbody>

                       @foreach ($empresas as $item)
                       <tr>
                            <th scope="row">{{$item->nit}}</th>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->telefono}}</td>
                            <td>{{$item->email}}</td>
                            {{-- asi aparece los datos cuando son relacionados y queremos que aparezca un dato en especifico --}}
                            <td>{{$item->ciudad->ciudad}},{{$item->departamento->departamento}}</td>
                            <td>
                                {{-- se pasa el id para editar la sucursal  --}}
                                <a href="{{route('empresas.edit', $item->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
               
                                {{-- se utliza el metodo de eliminar         --}}
                                <form action="{{route('empresas.destroy', $item->id)}}" class="d-inline formulario-eliminar" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                            <td>
                                <a href="{{route('registro.index')}}" class="btn btn-info" ><i class="fas fa-info-circle"></i></a>
                            </td>
                        </tr> 
                                    
                       @endforeach                  
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal de Formulario para crear empresa  -->
    <div id="agregarEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title">Registra la nueva empresa</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('empresas.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"><strong>Nit:</strong></span>
                            <input name="nit" type="number" min="0" class="form-control"  value="{{old('nit')}}" placeholder="Escribe el Nit de la empresa">
                        </div>
                        @error('nit')
                            <div class="alert alert-warning">
                                <small>{{$message}}</small>
                            </div>   
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text"><strong>Nombre:</strong></span>
                            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Escribe el nombre de la empresa">
                        </div>
                        @error('nombre')
                            <div class="alert alert-warning">
                                <small>{{$message}}</small>
                            </div> 
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text"><strong>Telefono:</strong></span>
                            <input type="number" min="0" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><strong>Email:</strong></span>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Escribe el email">
                        </div>
                        @error('email')
                            <div class="alert alert-warning">
                                <small>{{$message}}</small>
                            </div> 
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text"><strong>Departamento:</strong></span>
                            <select class="form-control" name="id_departamento">
                                <option value="{{old('id_departamento')}}"></option>
                                @foreach ($departamento as $item)
                                    <option value="{{$item->id}}">{{$item->departamento}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_departamento')
                            <div class="alert alert-warning">
                                <small>{{$message}}</small>
                            </div> 
                        @enderror

                        <div class="input-group mb-3">
                            <span class="input-group-text"><strong>Ciudad:</strong></span>
                            <select class="form-control" name="id_ciudad">
                                <option value="{{old('id_ciudad')}}"></option>
                                @foreach ($ciudad as $item)
                                    <option value="{{$item->id}}">{{$item->ciudad}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_ciudad')
                        <div class="alert alert-warning">
                            <small>{{$message}}</small>
                        </div> 
                        @enderror

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>

        @if (session('error')) 
            <script>

                Swal.fire(

                    'Se elimino ',
                    '{{ session('error')}}',
                    'success'
                );
            </script>
        @endif


        <script>
        @if (session('success')) 
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        $('.formulario-eliminar').submit(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estas seguro que deseas eliminarlo?',
                text: 'Una vez hagas lo elimines no hay vuelta atras!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'si, eliminar!'

                }).then((result) => {

                if (result.value) {

                    this.submit();

                    
                }
            });
        });

        </script>

       
    
    
@stop
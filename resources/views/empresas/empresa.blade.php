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

            <table class="table text-center">
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
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarEmpresa"><i class="fas fa-pen"></i></button>
                                   
                                    {{-- ==================================================================================================
                                                             MODAL EDITAR
                                    ================================================================================================== --}}
                                    <div id="editarEmpresa" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar la empresa</h4>
                                                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="{{route('empresas.update', $item->id)}}" method="POST">

                                                    <div class="modal-body">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Nit:</label>
                                                            <input name="nit" type="number" min="0" class="form-control" disabled value="{{$item->nit}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nombre:</label>
                                                            <input type="text" name="nombre" class="form-control" value="{{$item->nombre}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Telefono:</label>
                                                            <input type="number" min="0" name="telefono" value="{{$item->telefono}}" class="form-control" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email:</label>
                                                            <input type="email" name="email" value="{{$item->email}}" class="form-control"  disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Departamento:</label>
                                                            <select class="form-control" name="id_departamento" required>
                                                                <option value="{{$item->departamento->id}}">{{$item->departamento->departamento}}</option>
                                                                @foreach ($departamento as $item)
                                                                    <option value="{{$item->id}}">{{$item->departamento}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Ciudad:</label>
                                                            <select class="form-control" name="id_ciudad"  required>
                                                                @foreach ($ciudad as $item)
                                                                    <option value="{{$item->id}}">{{$item->ciudad}}</option>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Registrar</button>
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ==================================================================================================
                                                            FINAL DE LA MODAL EDITAR
                                    ================================================================================================== --}}

                                {{-- se utliza el metodo de eliminar         --}}
                                <form action="{{route('empresas.destroy', $item->id)}}" class="d-inline" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                            <td>
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#adminEmpresa"><i class="fas fa-info-circle"></i></a>
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
                <div class="modal-header">
                    <h4 class="modal-title">Registra la nueva empresa</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('empresas.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nit:</label>
                            <input name="nit" type="number" min="0" class="form-control"  value="" placeholder="Escribe el Nit de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="" placeholder="Escribe el nombre de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        <div class="form-group">
                            <label>Departamento:</label>
                            <select class="form-control" name="id_departamento"  required>
                                <option value=""></option>
                                @foreach ($departamento as $item)
                                    <option value="{{$item->id}}">{{$item->departamento}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ciudad:</label>
                            <select class="form-control" name="id_ciudad"  required>
                                <option value=""></option>
                                @foreach ($ciudad as $item)
                                    <option value="{{$item->id}}">{{$item->ciudad}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Formulario para agregar admin  -->
    <div id="adminEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Admin de la empresa</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form method="POST" action="{{ route('register') }}"">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="name" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password"  name="password" value="" class="form-control" placeholder="Escribe la contraseña">
                        </div>
                        
                        <div class="form-group">
                            <label>Repita la Contraseña:</label>
                            <input type="password"  name="password_confirmation" value="" class="form-control" placeholder="Escribe la contraseña">
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <select class="form-control" name="ciudad"  required>
                                @foreach ($empresas as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                                
                            </select>
                        </div>

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
    @if (session('mensaje')) 
    <script>
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title: '{{ session('mensaje') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
@stop
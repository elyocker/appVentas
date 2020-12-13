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
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Acciones</th>
                    <th scope="col">Admin</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fallabela</td>
                            <td>calle 45</td>
                            <td>14578888</td>
                            <td>cali,valle</td>
                            <td>
                                {{-- se pasa el id para editar la sucursal  --}}
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editarEmpresa"><i class="fas fa-pen"></i></a>
                                {{-- se utliza el metodo de eliminar         --}}
                                
                                   
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                               
                            </td>
                            <td>
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#adminEmpresa"><i class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>                   
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
                <form action="" method="POST">
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
                            <select class="form-control" name="ciudad"  required>
                                <option value=""> </option>
                                <option value="">valle</option>
                                <option value="">distrito capital</option>
                                <option value="">antioquia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ciudad:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value=""> </option>
                                <option value="">cali</option>
                                <option value="">bogota</option>
                                <option value="">medellin</option>
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <select class="form-control" name="id_empresa" id="sel1" required>
                                @foreach ($empresa as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Formulario para editar empresa  -->
    <div id="editarEmpresa" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar la empresa</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nit:</label>
                            <input name="nit" type="number" min="0" class="form-control" disabled value="12121" placeholder="Escribe el Nit de la empresa">
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
                            <input type="email" name="email" value="" class="form-control" placeholder="Escribe el email" disabled>
                        </div>
                        <div class="form-group">
                            <label>Ubicacion:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value=""> </option>
                                <option value="">valle</option>
                                <option value="">distrito capital</option>
                                <option value="">antioquia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ciudad:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value=""> </option>
                                <option value="">cali</option>
                                <option value="">bogota</option>
                                <option value="">medellin</option>
                            </select>
                        </div>
                        
                        {{-- <div class="form-group">
                            <select class="form-control" name="id_empresa" id="sel1" required>
                                @foreach ($empresa as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Formulario para editar empresa  -->
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
                            <input type="password_confirmation"  name="repita_password" value="" class="form-control" placeholder="Escribe la contraseña">
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value="">Ecom</option>
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
@stop
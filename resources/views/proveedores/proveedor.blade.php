@extends('adminlte::page')

@section('title', 'Proveedores')


@section('content_header')
    <h1>Modulo de Proveedores</h1>
@stop

@section('content')
    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#agregarProveedores">Agregar Proveedor</button>
    <div class="card">
        <div class="card-header text-center"><strong>Registro de Proveedores</strong></div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="thead-dark ">
                  <tr class="center">
                    <th scope="col">Nombre</th>
                    <th scope="col">categoria</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>humberto rojas</td>
                            <td>lacteos</td>
                            <td>5785455</td>
                            <td>calle 122</td>
                            <td>Falabella</td>
                            <td>
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editarProveedores"><i class="fas fa-pen"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>                   
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Formulario para agregar empresa  -->
    <div id="agregarProveedores" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Proveedor</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input name="nombre" type="text" class="form-control"  value="" placeholder="Escribe el Nit de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Categoria:</label>
                            <input type="text" name="categoria" class="form-control" value="" placeholder="Escribe el nombre de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Producto:</label>
                            <input type="text"  name="producto" value="" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="email" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value="">Falabella</option>
                                <option value="">Ecom</option>
                                <option value="">Fecode</option>
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
    <!-- Modal de Formulario para Editar proveedor   -->
    <div id="editarProveedores" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Proveedor</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input name="nombre" type="text" class="form-control"  value="" placeholder="Escribe el Nit de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Categoria:</label>
                            <input type="text" name="categoria" class="form-control" value="" placeholder="Escribe el nombre de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Producto:</label>
                            <input type="text"  name="producto" value="" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="email" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <input type="text" name="id_empresa" value="Fallabela" disabled class="form-control" >
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
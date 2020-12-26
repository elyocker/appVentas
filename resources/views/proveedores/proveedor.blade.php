@extends('adminlte::page')

@section('title', 'Proveedores')


@section('content_header')
    <h1>Modulo de Proveedores</h1>
@stop

@section('content')
@if (Auth::check())
    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#agregarProveedores">Agregar Proveedor</button>
    <div class="card">
        <div class="card-header text-center"><strong>Registro de Proveedores</strong></div>
        <div class="card-body">
            <table class="table text-center table-hover">
                <thead class="thead-dark">
                  <tr class="center">
                    <th scope="col">Nombre</th>
                    <th scope="col">categoria</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($prove as $pro)
                        <tr>
                            <td>{{$pro->nombre}}</td>
                            <td>{{$pro->categoria->categoria}}</td>
                            <td>{{$pro->producto}}</td>
                            <td>{{$pro->telefono}}</td>
                            <td>{{$pro->empresa->nombre}}</td>
                            <td>
                                <a href="{{route('proveedores.edit', $pro->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                <form action="{{route('proveedores.destroy', $pro->id)}}" method="POST" class="d-inline formulario-eliminar">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Formulario para agregar proveedores  -->
    <div id="agregarProveedores" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title">Agregar Proveedor</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('proveedores.store')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Cedula:</label>
                            <input type="number" min="0" name="cedula" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input name="nombre" type="text" class="form-control"  value="" placeholder="Escribe el Nit de la empresa">
                        </div>
                        <div class="form-group">
                            <label>Categoria:</label>
                            <select class="form-control" name="id_categoria" required>
                                @foreach ($categoria as $ca)
                                    <option value="{{$ca->id}}">{{$ca->categoria}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Producto:</label>
                            <input type="text"  name="producto" value="" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <select class="form-control" name="id_empresa" required>
                                @foreach ($empresa as $em)
                                    <option value="{{$em->id}}">{{$em->nombre}}</option>
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
@endif
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
        @if (session('delete')) 
            <script>

                Swal.fire(

                    'Se elimino ',
                    '{{ session('delete')}}',
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
@extends('adminlte::page')

@section('title', 'Sucursales')

@section('plugins.Sweetalert2')

@section('content_header')
    <h1>Sucursales</h1>
@stop

@section('content')
    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#agregarSucursales">Agregar Sucursales</button>
    <div class="card">
        <div class="card-header text-center "><strong>Sucursales Registradas de la empresa Fallabela</strong></div>
        <div class="card-body">

            <table class="table text-center">
                <thead class="thead-dark ">
                  <tr class="center">
                    <th scope="col">Nit</th>
                    <th scope="col">Razon Social</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Ubicacion</th>
                    
                    <th scope="col">Acciones</th>
                    <th scope="col">Grafica</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fallabela</td>
                            <td>Santiago ramirez</td>
                            <td>calle 45</td>
                            <td>14578888</td>
                            <td>envigado,Antioquia</td>
                            <td>
                                {{-- se pasa el id para editar la sucursal  --}}
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editarSucursales"><i class="fas fa-pen"></i></a>
                                {{-- se utliza el metodo de eliminar         --}}
                                   
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#registroUsuarios"><i class="fas fa-info-circle"></i></a>
                            </td>
                            <td>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#GraficaSucursales"><i class="fas fa-chart-line"></i></a>
                            </td>
                        </tr>                   
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal de Formulario para crear empresa  -->
    <div id="agregarSucursales" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registra la nueva Sucursal</h4>
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
                            <label>Empresa:</label>
                            <input type="text" name="id_empresa" value="Fallabela" disabled class="form-control" >
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
                        
                        <div class="form-group">
                            <label>Administrador:</label>
                            <input type="text"  name="administrador" value="" class="form-control" placeholder="Escribe el responsable de la tienda">
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

    <!-- Modal de Formulario para crear empresa  -->
    <div id="editarSucursales" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registra la nueva Sucursal</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nit:</label>
                            <input name="nit" type="number" min="0" class="form-control"  value="12121">
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="outlet fallabela">
                        </div>
                        <div class="form-group">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="785222" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" value="envigado@fallabela.com" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <input type="text" name="id_empresa" value="Fallabela" disabled class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Departamento:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value="">antioquia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Ciudad:</label>
                            <select class="form-control" name="ciudad"  required>
                                <option value="">Envigado</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Administrador:</label>
                            <input type="text"  name="administrador" value="Roger ramirez" class="form-control" >
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
                        <button type="submit" class="btn btn-success">Modificar</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Formulario para editar empresa  -->
    <div id="registroUsuarios" class="modal fade" role="dialog">
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

    <!-- Modal de Formulario para editar empresa  -->
    <div id="GraficaSucursales" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Grafica de ventas de la sucursal Fallabela</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <canvas id="GraficaVentasSucursal"></canvas>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
                </div>
               
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script>
        // Swal.fire({
        //     position: 'top-end',
        //     type: 'success',
        //     title: 'Your work has been saved',
        //     showConfirmButton: false,
        //     timer: 1500
        //     });
    </script>
    <script>
        var ctx = document.getElementById('GraficaVentasSucursal').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@stop
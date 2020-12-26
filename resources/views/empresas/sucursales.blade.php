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

            <table class="table text-center table-hover">
                <thead class="thead-dark ">
                  <tr class="center">
                    <th scope="col">Nit</th>
                    <th scope="col">Razon Social</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Ubicacion</th>
                    
                    <th scope="col">Acciones</th>
                    <th scope="col">Grafica</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sucursales as $item)
                        <tr>
                            <th scope="row">{{$item->nit_sucursal}}</th>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->usuario->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->telefono}}</td>
                            <td>{{$item->ciudad->ciudad}},{{$item->departamento->departamento}}</td>
                            <td>
                                {{-- se pasa el id para editar la sucursal  --}}
                                <a href="{{route('sucursales.edit', $item->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                {{-- se utliza el metodo de eliminar--}}
                                <form action="{{route('sucursales.destroy', $item->id)}}" class="d-inline sucursal_eliminar" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{route('registro.index')}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                            </td>
                            <td>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#GraficaSucursales"><i class="fas fa-chart-line"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                                          
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal de Formulario para crear sucursal -->
    <div id="agregarSucursales" class="modal fade" role="dialog" aria-labelledby="agregarSucursales"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registra la nueva Sucursal</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('sucursales.store')}}" method="POST">
                    <div class="modal-body row">
                        @csrf
                        <div class="form-group col-md-6">
                            <label>Nit:</label>
                            <input name="nit_sucursal" type="number" min="0" class="form-control"  value="" placeholder="Escribe el Nit de la empresa">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="" placeholder="Escribe el nombre de la empresa">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telefono:</label>
                            <input type="number" min="0" name="telefono" value="" class="form-control" placeholder="Escribe el telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email:</label>
                            <input type="email" name="email" value="" class="form-control" placeholder="Escribe el email">
                        </div>
                        
                        
                        <div class="form-group col-md-6">
                            <label>Departamento:</label>
                            <select class="form-control" name="id_departamento" required>
                                @foreach ($departamento as $dep)
                                    <option value="{{$dep->id}}">{{$dep->departamento}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Ciudad:</label>
                            <select class="form-control" name="id_ciudad" required>
                                @foreach ($ciudad as $ciu)
                                    <option value="{{$ciu->id}}">{{$ciu->ciudad}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Empresa:</label>
                            <select class="form-control" name="id_empresa" required>
                                @foreach ($empresa as $empre)
                                    <option value="{{$empre->id}}">{{$empre->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label>Administrador:</label>
                            <select class="form-control" name="id_usuario" required>
                                @foreach ($respon as $res)
                                    <option value="{{$res->id}}">{{$res->name}}</option>
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

    <!-- Modal de Formulario para registro de personal de la sucursal  -->
    <div id="registroUsuarios" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">registro del personal</h4>
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
                            <label>Rol:</label>
                            <select class="form-control" name="rol"  required>
                                <option value="">Bodeguero</option>
                                <option value="">Cajera</option>
                                <option value="">Proveedor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Empresa:</label>
                            <select class="form-control" name="id_empresa"  required>
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

    <!-- Modal de grafica sucursal  -->
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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
        @if (session('delete')) 
            <script>

                Swal.fire(

                    'Se elimino',
                    '{{ session('delete')}}',
                    'success'
                );
            </script>
        @endif

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


    <script>
        //  ==========================================
        //         grafica de sucursal
        //  ==========================================
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
                            beginAtZero: true,
                            responsive: true 
                        }
                    }]
                }
            }
        });
        


        $('.sucursal_eliminar').submit(function (e) {
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
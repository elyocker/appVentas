@extends('adminlte::page')

@section('title', 'Solicitar Producto')



@section('content_header')
    <h1>Solicitar articulo</h1>
@stop

@section('content')
    @if (Auth::check())
        <div class="card">
            <div class="card-header text-center"><strong>Solicitar articulo</strong></div>
            <form action="{{route('solicitar.store')}}" method="POST"> 
                <div class="card-body">
                    
                        @csrf
                        <div class="row">
                                            
                            <div class="col-md-4">
                                <label class="form-label">Producto:</label>
                                <input type="text" class="form-control" name="producto" value="" required>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label class="form-label">Categoria:</label>
                                <select  class="form-control" name="id_categoria" >
                                    @foreach ($categoria as $ca)
                                        <option value="{{$ca->id}}">{{$ca->categoria}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Cantidad:</label>
                                <input type="number" min="0" class="form-control" name="cantidad" value="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Fecha de garantia:</label>
                                <input type="date" class="form-control" name="fecha_garantia" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Fecha de Entrega:</label>
                                <input type="date" class="form-control" name="fecha_entrega" value="" required>
                            </div>
                            {{-- <div class="col-md-4">
                                <label class="form-label">Proveedor:</label>
                                <select class="form-control" name="id_proveedor">
                                    @foreach ($provee as $pro)
                                        <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="col-md-4">
                                <label class="form-label">Empresa:</label>
                                <select class="form-control" name="id_empresa">
                                    @foreach ($usuarioEm as $emp)
                                        <option value="{{$emp->id}}">{{$emp->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Sucursal:</label>
                                <select class="form-control" name="id_sucursal">
                                    @foreach ($sucursal as $suc)
                                        <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                            
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Solicitar</button>
                </div>
            </form>
        </div>
        {{-- tabla de solicitudes  --}}
        <div class="card">
            <div class="card-header text-center "><strong >Solicitudes En Proceso</strong></div>

                <div class="card-body">
                    <table class="table text-center">
                        <thead class="thead-dark ">
                        <tr class="center">
                            <th scope="col"># de solicitud</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Pide</th>
                            <th scope="col">Fecha de Entrega</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitar as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->categoria->categoria}}</td>
                                    <td>{{$item->producto}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td>{{$item->empresa->nombre}}</td>
                                    <td>{{$item->fecha_Entrega}}</td>
                                    <td>
                                        
                                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#detalleSolicitud"><i class="fas fa-info-circle"></i></a>
                                        
                                        <form action="{{route('solicitar.destroy', $item->id)}}" class="d-inline formulario-eliminar" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                        
                                        {{-- se utliza el metodo de eliminar         --}}
                                        
                                    </td>
                                    
                                </tr>
                                {{-- modal de detalles de solicitudes  --}}
                                <div id="detalleSolicitud" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detalle de la solicitud</h4>
                                                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body" align="center">
                                                <div class="card" style="width: 18rem;">
                                                    
                                                    <div class="card-body">
                                                        <h5 class="text-center">{{$item->producto}}</h5>
                                                        <small class="badge badge-warning mb-1">En proceso</small>

                                                        <p class="card-text"><strong>Categoria:</strong> {{$item->categoria->categoria}}</p>
                                                        <p class="card-text"><strong>Cantidad:</strong> {{$item->cantidad}}</p>
                                                        <p class="card-text"><strong>Fecha de Entrega:</strong> {{$item->fecha_Entrega}}</p>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                                                  
                        </tbody>
                    </table>
                </div>
            
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
@extends('adminlte::page')

@section('title', 'Solicitar Producto')



@section('content_header')
    <h1>Solicitar articulo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-center"><strong>Solicitar articulo</strong></div>
        <form action="" method="POST"> 
            <div class="card-body">
                
                    @csrf
                    <div class="row">
                                        
                        <div class="col-md-4">
                            <label class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="">
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="form-label">Categoria:</label>
                            <select  class="form-control" name="fecha_garantia" value="">
                                <option selected>Carnes</option>
                                <option selected>lacteos</option>
                                <option selected>perecederos</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Cantidad:</label>
                            <input type="number" min="0" class="form-control" name="cantidad" value="">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Fecha de garantia:</label>
                            <input type="date" class="form-control" name="fecha_garantia" value="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha de Entrega:</label>
                            <input type="date" class="form-control" name="fecha_entrega" value="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Empresa:</label>
                            <input type="text" class="form-control" disabled name="id_empresa" value="falabell">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sucursal:</label>
                            <select class="form-control" name="id_sucursal" value="">
                                <option selected>outlet cali</option>
                                <option selected>outlet medellin</option>
                                <option selected>outlet bogota</option>
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
                        <th scope="col">Proveedor</th>
                        <th scope="col">Pide</th>
                        <th scope="col">Fecha de Entrega</th>
                        <th scope="col">Detalle</th>
                      </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th scope="row">as555q</th>
                                <td>carnes</td>
                                <td>lomo de rex </td>
                                <td>Proceso</td>
                                <td>50</td>
                                <td>humberto rojas</td>
                                <td>Falabella, outlet Bogota</td>
                                <td>25/12/2020</td>
                                <td>
                                    
                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#detalleSolicitud"><i class="fas fa-info-circle"></i></a>
                                    {{-- se utliza el metodo de eliminar         --}}
                           
                                </td>
                                
                            </tr>                   
                    </tbody>
                </table>
            </div>
        
    </div>

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
                            <h5 class="text-center">Lomo de rex</h5>
                            <small class="badge badge-warning mb-1">En proceso</small>

                            <p class="card-text"><strong>Categoria:</strong> Carnes</p>
                            <p class="card-text"><strong>Cantidad:</strong> 50</p>
                            <p class="card-text"><strong>Fecha de Entrega:</strong> 25/12/2020</p>
                            
                        </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        
    </style>
@stop

@section('js')
    <script> 
    
    
    </script>
@stop
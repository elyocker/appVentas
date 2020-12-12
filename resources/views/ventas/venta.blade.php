@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Facturación</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-center"><strong>Productos</strong></div>
        <div class="card-body">

            <table class="table text-center">
                <thead class="thead-dark ">
                  <tr class="center">
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Valor Und</th>
                    <th scope="col">IVA</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Fecha de caducidad</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">875545</th>
                            <td>lomo de rex</td>
                            <td>250</td>
                            <td>25000</td>
                            <td>8500</td>
                            <td>humberto rojas</td>
                            <td>Falabella, outlet Bogota</td>
                            <td>25/12/2020</td>
                            <td>
                                {{-- boton de compra  --}}
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#editarProducto"><i class="fas fa-shopping-cart"></i></a>
                                
                            </td>
                            
                        </tr>                   
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-danger col-md-12">Facturar</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
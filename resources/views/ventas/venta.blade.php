@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Facturación</h1>
@stop

@section('content')
@if (Auth::check())
    <div class="row">
        <div class="card col-md-6">
            <div class="card-header text-center"><strong>Productos</strong></div>
            <div class="card-body col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">Valor Und</th>
                        <th scope="col">IVA</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">875545</th>
                        <td>carne rex</td>
                        <td>250</td>
                        <td>25000</td>
                        <td>7500</td>
                        <td>
                            <a href="" class="btn btn-success" data-toggle="modal" data-bs-toggle="tooltip" title="carrito de compras" data-target="#carroCompras"><i class="fas fa-shopping-cart"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">87</th>
                        <td>carne rex</td>
                        <td>250</td>
                        <td>25000</td>
                        <td>7500</td>
                        <td>
                            <a href="" class="btn btn-success" data-toggle="modal" data-bs-toggle="tooltip" title="carrito de compras" data-target="#carroCompras"><i class="fas fa-shopping-cart"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            

            </div>
        </div>

        <div class="card col-md-6 ">
            <div class="card-header text-center"><strong>Lista de compras</strong></div>
            <form action="" method="POST">

                <div class="card-body">

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <td>Codigo</td>
                                <td>Producto</td>
                                <td>Cantidad</td>
                                <td>Iva</td>
                                <td>Valor total</td>
                                <td>Acción</td>
                            </tr>
                        </thead>
                        <tbody id="listaCompra">    
                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger col-md-12">Facturar</button>
                </div>

            </form>
        </div>
    </div>
    

    {{-- ======================================
        MODAL DE VENTAS
    ====================================== --}}
    <div id="carroCompras" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="text-center">Agregar compra</h4>
                    <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" align="center">
                    <form action="" class="row" id="formVenta">
                        @csrf
                        <div class="form-group col-md-6 ">
                            <label>Codigo:</label>
                            <input id="codigo" name="codigo" type="number" min="0" class="form-control text-center" readonly value="12121">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Producto:</label>
                            <input id="nombre" name="nombre" type="text" class="form-control text-center" readonly value="carne de rex">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Cantidad:</label>
                            <input id="cantidad" name="cantidad" type="number" min="0" class="form-control text-center"  value="8">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>IVA:</label>
                            <input id="iva" name="iva" type="number" min="0" class="form-control text-center" readonly value="12000">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Valor total:</label>
                            <input id="valorTotal" name="valor_total" type="number" min="0" class="form-control text-center" readonly value="50000">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-success" id="agregar">Agregar</button>
                        </div>
                    </form>
                </div>

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
    <script>

    $(document).on('click', '#agregar', function(){

        var formVenta = $('#formVenta').serialize();

        var tam = formVenta.length;
        tabla ='';
        console.log(formVenta);
        
        
        for (let i = 0; i < tam; i++) {
            element = formVenta[i];
            
            
            
            tabla += '<tr>';
            tabla += '<td>'+element['codigo']+'</td>';
            tabla += '<td>'+element['nombre']+'</td>';
            tabla += '<td>'+element['cantidad']+'</td>';
            tabla += '<td>'+element['iva']+'</td>';
            tabla += '<td>'+element['valor_total']+'</td>';
            tabla += '<td> <button type="button" class="col-sm-2"  id="eliminarVenta" title="Eliminar de la lista"><i class="fas fa-times-circle"></i></button></button></td>';
            tabla += '</tr>';
            

        }

        document.getElementById('listaCompra').innerHTML = tabla;
        
    });

    </script>
@stop
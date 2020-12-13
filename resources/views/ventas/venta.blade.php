@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Facturación</h1>
@stop

@section('content')
<div class="row">
    <div class="card col-md-6">
        <div class="card-header text-center"><strong>Productos</strong></div>
        <div class="card-body col-md-12">
            <table class="table">
                <thead class="thead-dark ">
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
                </tbody>
            </table>
           

        </div>
    </div>

    <div class="card col-md-6 ">
        <div class="card-header text-center"><strong>Lista de compras</strong></div>
        <form action="" method="POST">
            <div class="card-body">
                <table class="table table-hover ">
                    <thead >
                      <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">Valor Und</th>
                        <th scope="col">IVA</th>
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
                            <a href="" class="col-sm-1" title="Eliminar de la lista">
                                <i class="fas fa-times-circle"></i>
                            </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">875545</th>
                        <td>carne rex</td>
                        <td>250</td>
                        <td>25000</td>
                        <td>7500</td>
                        <td>
                            <a href="" class="col-sm-1" title="Eliminar de la lista">
                                <i class="fas fa-times-circle"></i>
                            </a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-danger col-md-12">Facturar</button>
            </div>
        </form>
    </div>
</div>
<div class="card col-md-6">
   <div class="card-body">
       <label for="">campo:</label>
    <input type="text" id="campo">
    <button type="button" class="btn btn-default" id="boton">enviar</button>
    <br>
    <p id="get"></p>
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
                <form action="" class="row">
                    @csrf
                    <div class="form-group col-md-6 ">
                        <label>Codigo:</label>
                        <input name="Codigo" type="number" min="0" class="form-control text-center" disabled value="12121">
                    </div>
                    <div class="form-group col-md-6 ">
                        <label>Producto:</label>
                        <input name="nombre" type="text" class="form-control text-center" disabled value="carne de rex">
                    </div>
                    <div class="form-group col-md-6 ">
                        <label>Cantidad:</label>
                        <input name="cantidad" type="number" min="0" class="form-control text-center"  value="8">
                    </div>
                    <div class="form-group col-md-6 ">
                        <label>IVA:</label>
                        <input name="iva" type="number" min="0" class="form-control text-center" disabled value="12000">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Valor total:</label>
                        <input name="valor_total" type="number" min="0" class="form-control text-center" disabled value="50000">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
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
    <script>
       $(document).on('click', '#boton', function(){
            var campo = document.getElementById('campo');

            const get = document.getElementById('get');
            
            get.innerHTML = campo.value +'<br>'+ get.innerHTML;
        });
    </script>
@stop
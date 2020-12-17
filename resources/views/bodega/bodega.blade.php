@extends('adminlte::page')

@section('title', 'Bodega')



@section('content_header')
    <h1>Bodega</h1>
@stop

@section('content')
<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#agregarProducto">Agregar producto</button>
<button class="btn btn-dark mb-2" data-toggle="modal" data-target="#agregarCategoria">Agregar Categoria</button>
<button class="btn btn-success mb-2"><i class="fas fa-file-excel"></i></button>
<button class="btn btn-danger mb-2"><i class="fas fa-file-pdf"></i></button>
<div class="card">
    <div class="card-header text-center "><strong>Productos de bodega</strong></div>

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
                                {{-- se pasa el id para editar la sucursal  --}}
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editarProducto"><i class="fas fa-pen"></i></a>
                                {{-- se utliza el metodo de eliminar         --}}
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                               
                            </td>
                            
                        </tr>                   
                </tbody>
            </table>
        </div>
    
</div>

{{-- modal de registro de productos --}}
<div id="agregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registra Nuevo productos</h4>
                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    @csrf
                    
                    <div class="form-group">
                        <label>Cantidad:</label>
                        <input type="number" name="codigo" min="0" value="" class="form-control" placeholder="Escribe el email">
                    </div>
                    <div class="form-group">
                        <label>Categoria:</label>
                        <select name="id_categoria" class="form-control">
                            <option value="">carnes</option>
                            <option value="">lacteos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Producto:</label>
                        <input type="text"  name="producto" value="" class="form-control" placeholder="Escribe el telefono">
                    </div>
                    <div class="form-group">
                        <label>Cantidad:</label>
                        <input type="number" name="cantidad" min="0" value="" class="form-control" placeholder="Escribe el email">
                    </div>
                    <div class="form-group">
                        <label>Valor por unidad:</label>
                        <input type="number" name="valor_und" min="0" value="" class="form-control" placeholder="Escribe el email">
                    </div>
                    <div class="form-group">
                        <label>IVA:</label>
                        <input type="number" name="iva" min="0" value="" class="form-control" placeholder="Escribe el email">
                    </div>
                    <div class="form-group">
                        <label>Fecha de vencimiento:</label>
                        <input type="date" name="fecha_vencimiento" value="" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Empresa:</label>
                        <input type="text" name="id_empresa" value="Falabella" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Sucursal:</label>
                        <input type="text"  name="id_sucursal" value="outlet bogota" class="form-control" disabled>
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
{{-- modal de registro de categoria --}}
<div id="agregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar nueva categoria de productos</h4>
                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    @csrf
          
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text"  name="categoria" value="" class="form-control" placeholder="Escribe la nueva categoria">
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
{{-- modal de Editar de productos --}}
<div id="editarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar productos</h4>
                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    @csrf
        
                    <div class="form-group">
                        <label>Categoria:</label>
                        <select name="categoria" class="form-control" value="carne">
                            <option value="">carnes</option>
                            <option value="">Lacteos</option>
                            <option value="">licor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Producto:</label>
                        <input type="text"  name="nombre" value="carne de rex" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Cantidad:</label>
                        <input type="number" name="cantidad" min="0" value="250" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label>Valor por unidad:</label>
                        <input type="number" name="valor_und" min="0" value="8500" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label>IVA:</label>
                        <input type="number" name="iva" min="0" value="1750" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label>Fecha de vencimiento:</label>
                        <input type="date" name="fecha_vencimiento" value="20/12/2020" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Empresa:</label>
                        <input type="text" name="id_empresa" value="Falabella" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Sucursal:</label>
                        <input type="text"  name="id_sucursal" value="outlet bogota" class="form-control" disabled>
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
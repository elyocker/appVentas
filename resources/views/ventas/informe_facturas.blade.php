@extends('adminlte::page')

@section('title', 'Informes')



@section('content_header')
    <h1>Informes</h1>
@stop

@section('content')
@if (Auth::check())
    <div class="card">
        <div class="card-header text-center"><strong>Informes por Rango de fechas</strong></div>
        <div class="card-body">
            <form action="" method="POST" class="row">
                <div class="form-group col-md-6">
                    <label for="">Fecha:</label>
                    <input type="date" class="form-control" value="" name="fecha1">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Fecha:</label>
                    <input type="date" class="form-control" value="" name="fecha2">
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="form-control btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-center"><strong>Resultado de la busqueda</strong></div>
        <div class="card-body">
            <label for="selecTodos">Seleccionar todos </label>
            <input type="checkbox" id="selecTodos">
            <table class="table table-hover" align="center">
                <thead >
                  <tr>
                    <th scope="col"># D`factura</th>
                    <th scope="col">Consecutivo</th>
                    <th scope="col">Fecha</th> 
                    <th scope="col">Selecciona</th> 
                    <th scope="col">Imprimir</th> 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">875545</th>
                    <td>FA192D</td>
                    <td>02/12/2020</td>
                    <td>
                        <input class="form-check-input"  type="checkbox" value="">
                    </td>
                    <td>
                        <a href="" class="btn btn-danger" title="imprimir en PDF">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <a href="" class="btn btn-success" title="imprimir en excel">
                            <i class="fas fa-file-excel"></i>
                        </a>
                    </td>
                  </tr>
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
@stop

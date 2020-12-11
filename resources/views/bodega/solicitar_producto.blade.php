@extends('adminlte::page')

@section('title', 'Solicitar Producto')



@section('content_header')
    <h1>Solicitar articulo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-center"><strong>Solicitar articulo</strong></div>
        <div class="card-body">
            <form action="" method="POST"> 
                @csrf
                <div class="row">
                    
                    <div class="col-md-6">
                        <label class="form-label">Id:</label>
                        <input type="text" class="form-control" name="id" value="">
                    </div>
                
                    <div class="col-md-6">
                        <label class="form-label">Id:</label>
                        <input type="text" class="form-control" name="id" value="">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Id:</label>
                        <input type="text" class="form-control" name="id" value="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Id:</label>
                        <input type="text" class="form-control" name="id" value="">
                    </div>
                    
                </div>
            </form>
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
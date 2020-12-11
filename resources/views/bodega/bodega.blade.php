@extends('adminlte::page')

@section('title', 'Bodega')



@section('content_header')
    <h1>Bodega</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Bodega</div>
        <div class="card-body">
            <input type="text">
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
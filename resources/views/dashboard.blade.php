
@extends('adminlte::page')

@section('title', 'Inicio')

@section('plugins.Chartjs')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header text-center"><strong>Informe Generales</strong></div>
        <div class="card-body">

            <div class="row">
                {{-- Grafica uno --}}
                
                <div class="card col-md-6 bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <canvas class="bg-light" id="grafica1"></canvas>
                    </div>
                </div>
                {{-- Grafica 2 --}}
                <div class="card col-md-6 bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <canvas class="bg-" id="grafica2"></canvas>
                    </div>
                </div>
                {{-- Grafica 3 --}}
                <div class="card col-md-6 bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <canvas class="bg-light" id="grafica3"></canvas>
                    </div>
                </div>
                {{-- Grafica 4 --}}
                <div class="card col-md-6 bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <canvas class="bg-light" id="grafica4"></canvas>
                    </div>
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
@stop

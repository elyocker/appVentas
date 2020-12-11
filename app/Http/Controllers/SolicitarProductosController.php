<?php

namespace App\Http\Controllers;

use App\Models\solicitarProductos;
use Illuminate\Http\Request;

class SolicitarProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bodega.solicitar_producto');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\solicitarProductos  $solicitarProductos
     * @return \Illuminate\Http\Response
     */
    public function show(solicitarProductos $solicitarProductos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\solicitarProductos  $solicitarProductos
     * @return \Illuminate\Http\Response
     */
    public function edit(solicitarProductos $solicitarProductos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\solicitarProductos  $solicitarProductos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, solicitarProductos $solicitarProductos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\solicitarProductos  $solicitarProductos
     * @return \Illuminate\Http\Response
     */
    public function destroy(solicitarProductos $solicitarProductos)
    {
        //
    }
}

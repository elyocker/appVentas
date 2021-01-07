<?php

namespace App\Http\Controllers;

use App\Models\bodega;
use App\Models\categorias;
use App\Models\Empresa;
use App\Models\sucursal;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodega = bodega::all();
        $empresa = Empresa::all();
        $sucursal = sucursal::all();
        $categoria = categorias::all();
        return view('bodega.bodega',compact('empresa','categoria','sucursal','bodega'));
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
        $bodega = request()->all();
        $bodega = request()->except('_token');
        bodega::insert($bodega);
        return back()->with('success','El producto se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit(bodega $bodega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bodega $bodega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy(bodega $bodega)
    {
        //
    }
}

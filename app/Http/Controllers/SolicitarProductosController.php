<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\Empresa;
use App\Models\proveedor;
use App\Models\solicitarProductos;
use App\Models\sucursal;
use App\Models\User;
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
        $usuarioEm = Empresa::all();
        $categoria = categorias::all();
        $sucursal = sucursal::all();
        $provee = proveedor::all();
        $solicitar = solicitarProductos::all();
        return view('bodega.solicitar_producto',compact('provee','usuarioEm','categoria','sucursal','solicitar'));
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
        $solicitud = request()->all();
        $solicitud =request()->except('_token');
        solicitarProductos::insert($solicitud);
        return back()->with('success','La solicitud se mando correctamente');
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
    public function destroy($id)
    {
        $soli = solicitarProductos::findOrFail($id);
        $soli::destroy($soli->id);
        return back()->with('delete','la solicitud se elimino correctamente');
    }
}

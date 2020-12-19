<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\departamento;
use App\Models\Empresa;
use App\Models\sucursal;
use App\Models\User;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respon = User::all();
        $empresa = Empresa::all();
        $ciudad = ciudades::all();
        $departamento = departamento::all();
        $sucursales = sucursal::all();
        return view('empresas.sucursales', compact('empresa','ciudad','departamento','respon','sucursales'));
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
        $sucursal = request()->all();
        $sucursal = request()->except('_token');
        sucursal::insert($sucursal);
        return back()->with('success','Se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal = sucursal::findOrFail($id);
        $respon = User::all();
        $empresa = Empresa::all();
        $ciudad = ciudades::all();
        $departamento = departamento::all();
        return view('empresas.editSucursal', compact('empresa','ciudad','departamento','respon','sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $sucursal = request()->all();
        $sucursal = request()->except('_token','_method');
        sucursal::where('id', '=', $id)->update($sucursal);
        return back()->with('success', 'la sucursal se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal = sucursal::findOrFail($id);
        sucursal::destroy($sucursal->id);
        return back()->with('delete','la sucursal se elimino correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\Empresa;
use App\Models\proveedor;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = categorias::all();
        $empresa = Empresa::all();
        $prove = proveedor::all();
        return view('proveedores.proveedor', compact('categoria','empresa','prove'));
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
    public function store(request $request)
    {
        $prove = $request->all();
        $prove = $request->except('_token');
        proveedor::insert($prove);
        return back()->with('success', 'El proveedor se registro correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provee = proveedor::findOrFail($id);
        $categoria = categorias::all();
        $empresa = Empresa::all();
        return view('proveedores.editprovee',compact('provee','categoria', 'empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provee = request()->all();
        $provee = request()->except('_token','_method');
        proveedor::where('id', '=', $id)->update($provee);
        return back()->with('success', 'Se modifico el proveedor correctamente');
        
        // $sucursal = request()->all();
        // $sucursal = request()->except('_token','_method');
        // sucursal::where('id', '=', $id)->update($sucursal);
        // return back()->with('success', 'la sucursal se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prove = proveedor::findOrFail($id);
        proveedor::destroy($prove->id);
        return back()->with('delete','El proveedor se elimino correctamente');
    }
}

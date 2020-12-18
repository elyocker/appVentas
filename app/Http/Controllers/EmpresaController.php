<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\departamento;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $ciudad = ciudades::all();
        $departamento = departamento::all();
        $empresas = Empresa::all();
        return view('empresas.empresa', compact('ciudad','departamento','empresas'));
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
        $empresa = $request->all();
        $empresa = $request->except('_token');
        Empresa::insert($empresa);
        return back()->with('mensaje','La empresa se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editEmpresa = Empresa::findOrFail($id);
       return back(compact('editEmpresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {

        $empresa = request()->all();
        $empresa= request()->except('_method','_token');
        Empresa::where('id', '=', $id)->update($empresa);

        return back()->with('mensaje','Se modifico correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empresa = Empresa::findOrFail($id);
        Empresa::destroy($empresa->id); //le paso el id para eliminarlo por completo

        return back()->with('mensaje','La empresa se Elimino correctamente');


    }
}

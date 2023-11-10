<?php

namespace App\Http\Controllers;

use App\Salida;
use App\Insumos;
use App\Local;
use Illuminate\Http\Request;

date_default_timezone_set('UTC');
ini_set('max_execution_time', 900);
set_time_limit(900);

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salidas=\DB::table('salidas')->join('insumos','salidas.id_insumo','=','insumos.id')->select('insumos.*','salidas.*')->where('insumos.deposito','>=',0)->get();
        $local="Guaribe";
        return view('salidas.index',compact('salidas','local'));
    }

    public function index2()
    {
        
        $salidas=\DB::table('salidas')->join('insumos','salidas.id_insumo','=','insumos.id')->select('insumos.*','salidas.*')->where('insumos.deposito','>=',0)->get();
        $local="Valle";

        return view('salidas.index',compact('salidas','local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2($local)
    {
        $local=Local::where('nombre','Guaribe')->get();
        
            $insumos=Insumos::where('id_local',$local->id)->get();
        
        return view('salidas.create',compact('insumos','local'));
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
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        //
    }
}

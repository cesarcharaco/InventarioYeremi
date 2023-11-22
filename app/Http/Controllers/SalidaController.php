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
    public function index($id_local)
    {

        $salidas=\DB::table('salidas')
        ->join('insumos','salidas.id_insumo','=','insumos.id')
        ->join('local','salidas.id_local','=','local.id')
        ->join('insumos_has_cantidades','insumos.id','=','insumos_has_cantidades.id_insumo')
        ->select('insumos.*','salidas.*','local.nombre','insumos_has_cantidades.stock_min','insumos_has_cantidades.stock_max','insumos_has_cantidades.deposito','insumos_has_cantidades.local')
        /*->where('insumosc.deposito','>=',0)
        ->where('insumosc.local','>=',0)*/
        ->where('local.id',$id_local)->get();
        
        $l=Local::find($id_local);
        
        return view('salidas.index',compact('salidas','l'));
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
    public function create2(Request $request)
    {
        
        $local=Local::find($request->id_local);
        //dd($local);
        //dd(is_null($local));
        if(!is_null($local)){

            $insumos=\DB::table('insumos')
        ->join('insumos_has_cantidades','insumos_has_cantidades.id_insumo','=','insumos.id')
        ->join('local','insumos_has_cantidades.id_local','=','local.id')
        ->select('insumos.id','insumos.producto','insumos.descripcion','insumos.serial','insumos_has_cantidades.stock_min','insumos_has_cantidades.stock_max','insumos_has_cantidades.deposito','insumos_has_cantidades.local','local.nombre')
        ->where('local.id',$local->id)->get();
        }else{
            $insumos=[];
        }


        //dd($insumos);
        return view('salidas.create',compact('insumos','local'));
    }

    public function create3($id_local)
    {
        
        $local=Local::find($id_local);
        //dd($local);
        if(!is_null($local)){

            $insumos=\DB::table('insumos')
        ->join('insumos_has_cantidades','insumos_has_cantidades.id_insumo','=','insumos.id')
        ->join('local','insumos_has_cantidades.id_local','=','local.id')
        ->select('insumos.id','insumos.producto','insumos.descripcion','insumos.serial','insumos_has_cantidades.stock_min','insumos_has_cantidades.stock_max','insumos_has_cantidades.deposito','insumos_has_cantidades.local','local.nombre')
        ->where('local.id',$local->id)->get();
        }else{
            $insumos=[];
        }


        //dd($insumos);
        return view('salidas.create',compact('insumos','local'));
    }

    public function seleccionar_local()
    {
        $locales=Local::all();

        return view('salidas.locales', compact('locales'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

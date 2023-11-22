<?php

namespace App\Http\Controllers;

use App\Insumos;
use App\InsumosC;
use App\Local;
use Illuminate\Http\Request;
use App\Http\Requests\InsumosRequest;
use App\Http\Requests\InsumosUpdateRequest;
use App\Gerencias;
class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$insumos=Insumos::all();
        $insumos=\DB::table('insumos')
        ->join('insumos_has_cantidades','insumos_has_cantidades.id_insumo','=','insumos.id')
        ->join('local','insumos_has_cantidades.id_local','=','local.id')
        ->select('insumos.id','insumos.producto','insumos.descripcion','insumos.serial','insumos_has_cantidades.stock_min','insumos_has_cantidades.stock_max','insumos_has_cantidades.deposito','insumos_has_cantidades.local','local.nombre','insumos_has_cantidades.id_local')->get();

        
        return view('inventario.insumos.index',compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales=Local::all(); 
        return view('inventario.insumos.create',compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsumosRequest $request)
    {
        //dd($request->all());
        $buscar=Insumos::where('producto',$request->producto)->count();
        if ($buscar>0) {
            flash('<i class="fa fa-check-circle-o"></i> Producto ya registrado, intente otra vez!')->warning()->important();
                return redirect()->to('insumos');    
        } else {
            $insumo=new Insumos();
            $request->serial=100;
            /*$insumo->fill($request->all())->save();*/
            $insumo->producto=$request->producto;
            $insumo->descripcion=$request->descripcion;
            $insumo->save();
            $insumo->serial=$insumo->id+100;
            $insumo->save();
            
            //cargando cantidades en los locales
            for ($i=0; $i < count($request->id_local); $i++) { 
                $insumosc=new InsumosC();
                $insumosc->stock_min=$request->stock_min[$i];
                $insumosc->stock_max=$request->stock_max[$i];
                $insumosc->deposito=$request->deposito[$i];
                $insumosc->local=$request->deposito[$i];
                $insumosc->id_local=$request->id_local[$i];
                $insumosc->id_insumo=$insumo->id;
                $insumosc->save();
            }
            flash('<i class="fa fa-check-circle-o"></i> Insumo registrado exitosamente!')->success()->important();
                    return redirect()->to('insumos');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function show(Insumos $insumos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_insumo,$id_local)
    {
        /*$insumo=Insumos::find($id_insumo);
        $locales=Local::find($id_local); 
        //dd($id_local);*/
        $insumo=\DB::table('insumos')
        ->join('insumos_has_cantidades','insumos_has_cantidades.id_insumo','=','insumos.id')
        ->join('local','insumos_has_cantidades.id_local','=','local.id')
        ->select('insumos.id','insumos.producto','insumos.descripcion','insumos.serial','insumos_has_cantidades.stock_min','insumos_has_cantidades.stock_max','insumos_has_cantidades.deposito','insumos_has_cantidades.local','local.nombre','insumos_has_cantidades.id_local')
        ->where('insumos.id',$id_insumo)
        ->where('insumos_has_cantidades.id_local',$id_local)->first();
        return view('inventario.insumos.edit',compact('insumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function update(InsumosUpdateRequest $request, $id_insumo)
    {
        /*if ($request->serial!=="S/N") {
        $buscar=Insumos::where('serial',$request->serial)->where('id','<>',$id_insumo)->get();*/
        /*if (count($buscar)>0) {
            flash('<i class="fa fa-check-circle-o"></i> Serial ya registrado, intente otra vez!')->warning()->important();
            return redirect()->to('insumos');
        } else {*/
            $insumo=Insumos::find($request->id_insumo);
            $insumo->producto=$request->producto;
            $insumo->descripcion=$request->descripcion;
            $insumo->save();
            $insumosc=InsumosC::where('id_insumo',$request->id_insumo)->where('id_local',$request->id_local)->first();
            $insumosc->stock_min = $request->stock_min;
            $insumosc->stock_max = $request->stock_max;
            $insumosc->deposito = $request->deposito;
            $insumosc->local = $request->local;
            $insumosc->save();

            flash('<i class="fa fa-check-circle-o"></i> Insumo actualizado exitosamente!')->success()->important();
            return redirect()->to('insumos');
        //}
    /*}else{
            $insumo=Insumos::find($id_insumo);
        
        $insumo->fill($request->all())->save();
       
        flash('<i class="fa fa-check-circle-o"></i> Insumo actualizado exitosamente!')->success()->important();
        return redirect()->to('insumos');
    }*/
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $insumo=Insumos::find($request->id_insumo);

        if ($insumo->delete()) {
            flash('<i class="fa fa-check-circle"></i> El Insumo fue eliminado exitosamente!')->success()->important();
            return redirect()->back();
        } else {
            flash('<i class="fa fa-check-circle"></i> El Insumo no pudo ser eliminado!')->warning()->important();
            return redirect()->back();
        }
    }
}
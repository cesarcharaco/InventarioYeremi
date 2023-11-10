<?php

namespace App\Http\Controllers;

use App\Insumos;
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
        $insumos=Insumos::all();

        return view('inventario.insumos.index',compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('inventario.insumos.create');
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
            $insumo->fill($request->all())->save();
            $insumo->serial=$insumo->id+100;
            $insumo->save();
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
    public function edit($id_insumo)
    {
        $insumo=Insumos::find($id_insumo);
        

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
        if ($request->serial!=="S/N") {
        $buscar=Insumos::where('serial',$request->serial)->where('id','<>',$id_insumo)->get();
        if (count($buscar)>0) {
            flash('<i class="fa fa-check-circle-o"></i> Serial ya registrado, intente otra vez!')->warning()->important();
            return redirect()->to('insumos');
        } else {
            $insumo=Insumos::find($id_insumo);
            /*if ($request->entregados=="") {
                $entregados=0;
            }else{
                $entregados=$request->entregados;
            }
            if ($request->usados=="") {
                $usados=0;
            }else{
                $usados=$request->usados;
            }*/
            /*$insumo->fill($request->all(),['except' => ['entregados','usados']])->save();*/
            $insumo->fill($request->all())->save();
            /*$i=Insumos::find($insumo->id);
            $i->entregados=$entregados;
            $i->usados=$usados;
            $i->save();*/
            flash('<i class="fa fa-check-circle-o"></i> Insumo actualizado exitosamente!')->success()->important();
            return redirect()->to('insumos');
        }
    }else{
            $insumo=Insumos::find($id_insumo);
        /*if ($request->entregados=="") {
            $entregados=0;
        }else{
            $entregados=$request->entregados;
        }
        if ($request->usados=="") {
            $usados=0;
        }else{
            $usados=$request->usados;
        }*/
        $insumo->fill($request->all())->save();
        /*$i=Insumos::find($insumo->id);
        $i->entregados=$entregados;
        $i->usados=$usados;
        $i->save();*/
        flash('<i class="fa fa-check-circle-o"></i> Insumo actualizado exitosamente!')->success()->important();
        return redirect()->to('insumos');
    }
        
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
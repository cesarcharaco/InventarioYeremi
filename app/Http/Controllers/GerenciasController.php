<?php

namespace App\Http\Controllers;

use App\Gerencias;
use Illuminate\Http\Request;
use App\Http\Requests\GerenciasRequest;
class GerenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gerencias=Gerencias::all();

        return view('gerencias.index',compact('gerencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gerencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GerenciasRequest $request)
    {
        //dd($request->all());
        $buscar=Gerencias::where('gerencia',$request->gerencia)->count();
        if ($buscar>0) {
            flash('<i class="icon-circle-check"></i> Gerencia ya registrada verifique!')->warning()->important();
            return redirect()->back();
        } else {
            $gerencia=new Gerencias();
            $gerencia->gerencia=$request->gerencia;
            $gerencia->save();

            flash('<i class="fa fa-check-circle"></i> Gerencia registrada exitosamente!')->success()->important();
            return redirect()->to('gerencias');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gerencia=Gerencias::find($id);

        return view('gerencias.edit',compact('gerencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $buscar=Gerencias::where('gerencia',$request->gerencia)->where('id','<>',$id)->count();
        if ($buscar>0) {
            flash('<i class="icon-circle-check"></i> Gerencia ya registrada verifique!')->warning()->important();
            return redirect()->back();
        } else {
            $gerencia= Gerencias::find($id);
            $gerencia->gerencia=$request->gerencia;
            $gerencia->save();

            flash('<i class="icon-circle-check"></i> Gerencia actualizada exitosamente!')->success()->important();
            return redirect()->to('gerencias');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id_gerencia==1 || $request->id_gerencia==2) {
            flash('<i class="icon-circle-check"></i>Ésta Gerencia no debe ser elminada!')->success()->important();
            return redirect()->to('gerencias');
        } else {
            
        $gerencia=Gerencias::find($request->id_gerencia);
        if ($gerencia->delete()) {
            flash('<i class="icon-circle-check"></i> Gerencia eliminada exitosamente!')->success()->important();
            return redirect()->to('gerencias');
        } else {
            flash('<i class="icon-circle-check"></i>La Gerencia no pudo ser elminada!')->success()->important();
            return redirect()->to('gerencias');
        }
        
        }
    }
}

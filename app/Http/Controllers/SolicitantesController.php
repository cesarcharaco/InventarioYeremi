<?php

namespace App\Http\Controllers;

use App\Solicitantes;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitantesRequest;
class SolicitantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitantes=Solicitantes::all();

        return view('solicitantes.index',compact('solicitantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitantesRequest $request)
    {
        //dd($request->all());
        $solicitante=new Solicitantes();
        $solicitante->fill($request->all())->save();
        flash('<i class="fa fa-check-circle-o"></i> Solicitante registrado exitosamente!')->success()->important();
        return redirect()->to('solicitantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitantes  $solicitantes
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitantes $solicitantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitantes  $solicitantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id_solicitante)
    {
        $solicitante=Solicitantes::find($id_solicitante);

        return view('solicitantes.edit',compact('solicitante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitantes  $solicitantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_solicitante)
    {
        $buscar=Solicitantes::where('rut',$request->rut)->where('id','<>',$id_solicitante)->get();

        if (count($buscar)>0) {
            flash('<i class="fa fa-check-circle-o"></i> RUT ya registrado, intente otra vez!')->warning()->important();
            return redirect()->to('solicitantes');
        }else{
            $buscar2=Solicitantes::where('email',$request->email)->where('id','<>',$id_solicitante)->get();            
            if (count($buscar2)>0) {
            flash('<i class="fa fa-check-circle-o"></i> Email ya registrado, intente otra vez!')->warning()->important();
            return redirect()->to('solicitantes');
            }else{
                
                $solicitante=Solicitantes::find($id_solicitante);
                $solicitante->fill($request->all())->save();
                flash('<i class="fa fa-check-circle-o"></i> Solicitante actualizado exitosamente!')->success()->important();
                return redirect()->to('solicitantes');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitantes  $solicitantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $solicitante=Solicitantes::find($request->id_solicitante);

        if ($solicitante->delete()) {
            flash('<i class="fa fa-check-circle"></i> El Solicitante fue eliminado exitosamente!')->success()->important();
            return redirect()->back();
        } else {
            flash('<i class="fa fa-check-circle"></i> El Solicitante no pudo ser eliminado!')->warning()->important();
            return redirect()->back();
        }

            
    }

    public function cambiar_status(Request $request)
    {
        
        $solicitante = Solicitantes::find($request->id_solicitante);
        
        $solicitante->status=$request->status;
        $solicitante->save();

        flash('<i class="fa fa-check-circle"></i> Status del Solicitante '.$solicitante->nombres.' cambiado exitosamente a '.$request->status.'!')->success()->important();
        return redirect()->to('solicitantes');
    }
}

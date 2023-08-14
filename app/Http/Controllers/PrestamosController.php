<?php

namespace App\Http\Controllers;

use App\Prestamos;
use Illuminate\Http\Request;
use App\Solicitantes;
use App\Insumos;
use App\Gerencias;
use App\Areas;
use App\HistorialPrestamos;
date_default_timezone_set('UTC');
ini_set('max_execution_time', 900);
set_time_limit(900);
class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$solicitantes=Solicitantes::all();

        $prestamos=\DB::table('insumos')->join('prestamos','prestamos.id_insumo','=','insumos.id')->join('solicitantes','solicitantes.id','=','prestamos.id_solicitante')->select('solicitantes.nombres','solicitantes.rut','solicitantes.id','insumos.producto','insumos.descripcion','insumos.serial','prestamos.tipo','prestamos.fecha_prestamo','prestamos.fecha_devuelto','prestamos.status','prestamos.cantidad','prestamos.id')->get();
        //dd($prestamos);
        return view('inventario.prestamos.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitantes=Solicitantes::where('status','<>','Inactivo')->get();
        $gerencias=Gerencias::all();
        $insumos=Insumos::where('id_gerencia',1)->get();
        $hoy=date('Y-m-d');
        return view('inventario.prestamos.create',compact('solicitantes','gerencias','insumos','hoy'));

    }

    public function buscar_insumos($id_gerencia)
    {
        return $insumos=Insumos::where('id_gerencia',$id_gerencia)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if ($request->todos==null) {
            # para registrar uno o varios solicitantes
            
            if ($request->id_solicitante==null) {
                flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar al menos un Solicitante!')->warning()->important();
                return redirect()->back();
            }else{
                if ($request->id_gerencia==null) {
                    flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar una Gerencia!')->warning()->important();
                    return redirect()->back();
                } else {
                    if ($request->id_insumo==null) {
                    flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar un Insumo!')->warning()->important();
                    return redirect()->back();
                    } else {
                        if ($request->fecha_prestamo==null) {
                        flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar una fecha en la que realiza/ó el préstamo!')->warning()->important();
                        return redirect()->back();
                        } else {
                            $disponible=$this->buscar_existencia($request->id_insumo);
                            if ($request->cantidad>$disponible) {
                                flash('<i class="fa fa-check-circle-o"></i> La Cantidad a solicitar no puede ser mayor a la disponible del insumo seleccionado!')->warning()->important();
                                return redirect()->back();
                            } else {
                                //generando y buscando codigo
                                $buscar="";
                                do{
                                    $codigo=$this->generarCodigo();
                                    $buscar_codigo=HistorialPrestamos::where('codigo',$codigo)->first();
                                    if($buscar_codigo!==null){
                                        $buscar=$buscar_codigo->codigo;
                                    }
                                }while($codigo==$buscar);
                                //--- fin de la generacion y busqueda de codigo
                                for ($i=0; $i < count($request->id_solicitante) ; $i++) { 
                                        //actualizando existencias
                                        $insumo=Insumos::find($request->id_insumo);
                                        $insumo->in_almacen=$insumo->in_almacen-$request->cantidad;
                                        $insumo->disponibles=$insumo->disponibles-$request->cantidad;

                                    if ($request->tipo=="Prestar") {

                                        $insumo->out_almacen=$insumo->out_almacen+$request->cantidad;
                                        $insumo->save();
                                    }else{
                                        $insumo->entregados=$insumo->entregados+$request->cantidad;
                                        $insumo->existencia=$insumo->existencia-$request->cantidad;
                                        $insumo->save();
                                    }
                                    //registrando prestamo
                                        $prestamo=new Prestamos();
                                        $prestamo->id_solicitante=$request->id_solicitante[$i];
                                        $prestamo->id_insumo=$request->id_insumo;
                                        $prestamo->tipo=$request->tipo;
                                        $prestamo->observacion=$request->observacion;
                                        $prestamo->fecha_prestamo=$request->fecha_prestamo;
                                        if ($request->tipo=="Entregar") {
                                           $prestamo->status="No Aplica";
                                        }
                                        
                                        $prestamo->cantidad=$request->cantidad;
                                        $prestamo->save();
                                        //guardando en historial
                                        $historial=new HistorialPrestamos();
                                        $historial->id_prestamo=$prestamo->id;
                                        $historial->codigo=$codigo;
                                        $historial->save();
                                        //---------------------
                                }

                                if ($request->tipo=="Prestar") {
                                flash('<i class="fa fa-check-circle-o"></i> Préstamo Realizado exitosamente!')->warning()->important();
                                return redirect()->to('prestamos');
                                } else {
                                    flash('<i class="fa fa-check-circle-o"></i> Entrega Realizada exitosamente!')->warning()->important();
                                    return redirect()->to('prestamos');
                                }
                            }
                            
                        }
                    }    
                }
                
            }
        } else {
            # para registrarlos todos
            if ($request->id_gerencia==null) {
                flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar una Gerencia!')->warning()->important();
                return redirect()->back();
            } else {
                if ($request->id_insumo==null) {
                flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar un Insumo!')->warning()->important();
                return redirect()->back();
                } else {
                    if ($request->fecha_prestamo==null) {
                    flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar una fecha en la que realiza/ó el préstamo!')->warning()->important();
                    return redirect()->back();
                    } else {
                        $disponible=$this->buscar_existencia($request->id_insumo);
                        if ($request->cantidad>$disponible) {
                            flash('<i class="fa fa-check-circle-o"></i> La Cantidad a solicitar no puede ser mayor a la disponible del insumo seleccionado!')->warning()->important();
                            return redirect()->back();
                        } else {
                            $solicitantes=Solicitantes::where('status','Activo')->get();
                            if (count($solicitantes)>0) {
                            //generando y buscando codigo
                            $buscar="";
                            do{
                                $codigo=$this->generarCodigo();
                                $buscar_codigo=HistorialPrestamos::where('codigo',$codigo)->first();
                                if($buscar_codigo!==null){
                                    $buscar=$buscar_codigo->codigo;
                                }
                            }while($codigo==$buscar);
                            //--- fin de la generacion y busqueda de codigo
                            foreach ($solicitantes as $key) {
                                    //actualizando existencias
                                    $insumo=Insumos::find($request->id_insumo);
                                    $insumo->in_almacen=$insumo->in_almacen-$request->cantidad;
                                    $insumo->disponibles=$insumo->disponibles-$request->cantidad;
                                    
                                if ($request->tipo=="Prestar") {

                                    $insumo->out_almacen=$insumo->out_almacen+$request->cantidad;
                                    $insumo->save();
                                }else{

                                    $insumo->entregados=$insumo->entregados+$request->cantidad;
                                    $insumo->existencia=$insumo->existencia-$request->cantidad;
                                    $insumo->save();
                                }
                                //registrando prestamo
                                    $prestamo=new Prestamos();
                                    $prestamo->id_solicitante=$key->id;
                                    $prestamo->id_insumo=$request->id_insumo;
                                    $prestamo->tipo=$request->tipo;
                                    $prestamo->observacion=$request->observacion;
                                    $prestamo->fecha_prestamo=$request->fecha_prestamo;
                                    if ($request->tipo=="Entregar") {
                                           $prestamo->status="No Aplica";
                                        }
                                    $prestamo->cantidad=$request->cantidad;
                                    $prestamo->save();
                                    //guardando en historial
                                    $historial=new HistorialPrestamos();
                                    $historial->id_prestamo=$prestamo->id;
                                    $historial->codigo=$codigo;
                                    $historial->save();
                                    //---------------------                                   
                            }
                            if ($request->tipo=="Prestar") {
                                flash('<i class="fa fa-check-circle-o"></i> Préstamo Realizado exitosamente!')->warning()->important();
                                return redirect()->to('prestamos');
                            } else {
                                flash('<i class="fa fa-check-circle-o"></i> Entrega Realizada exitosamente!')->warning()->important();
                                return redirect()->to('prestamos');
                            }
                                
                            } else {
                                flash('<i class="fa fa-check-circle-o"></i> No existen solicitantes activos registrados!')->warning()->important();
                                return redirect()->back();
                            }
                        }
                        
                    }
                }    
            }
        }//fin del else de todos
    }//fin de la funcion store

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamos $prestamos)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_prestamo)
    {
        $prestamo=Prestamos::find($id_prestamo);
        $solicitante=Solicitantes::find($prestamo->id_solicitante);
        $gerencias=Gerencias::all();
        $insumos=Insumos::where('id_gerencia',$prestamo->insumos->id_gerencia)->get();
        $hoy=date('Y-m-d');
        return view('inventario.prestamos.edit',compact('solicitante','gerencias','insumos','hoy','prestamo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_prestamo)
    {
        //dd($request->all());
        
        if ($request->id_gerencia==null) {
            flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar una Gerencia!')->warning()->important();
            return redirect()->back();
        } else {
            if ($request->id_insumo==null) {
            flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar un Insumo!')->warning()->important();
            return redirect()->back();
            } else {
                if ($request->fecha_prestamo==null) {
                flash('<i class="fa fa-check-circle-o"></i> Debe seleccionar una Gerencia!')->warning()->important();
                return redirect()->back();
                } else {
                    $disponible=$this->buscar_existencia($request->id_insumo);
                    if ($request->cantidad>$disponible) {
                        flash('<i class="fa fa-check-circle-o"></i> La Cantidad a solicitar no puede ser mayor a la disponible del insumo seleccionado!')->warning()->important();
                        return redirect()->back();
                    } else {
                        
                                $prestamo=Prestamos::find($id_prestamo);
                                //devolviendo cambios de prestamos
                                $insumo=Insumos::find($prestamo->id_insumo);
                                $insumo->in_almacen=$insumo->in_almacen+$prestamo->cantidad;
                                $insumo->disponibles=$insumo->disponibles+$prestamo->cantidad;

                                if ($prestamo->tipo=="Prestar") {
                                $insumo->out_almacen=$insumo->out_almacen-$prestamo->cantidad;
                                    $insumo->save();
                                }else{
                                    $insumo->entregados=$insumo->entregados-$prestamo->cantidad;
                                    $insumo->existencia=$insumo->existencia+$prestamo->cantidad;
                                    $insumo->save();
                                }

                                //--------------------------------------
                                //actualizando existencias
                                $insumo=Insumos::find($request->id_insumo);
                                $insumo->in_almacen=$insumo->in_almacen-$request->cantidad;
                                $insumo->disponibles=$insumo->disponibles-$request->cantidad;

                            if ($request->tipo=="Prestar") {

                                $insumo->out_almacen=$insumo->out_almacen+$request->cantidad;
                                $insumo->save();
                            }else{
                                $insumo->entregados=$insumo->entregados+$request->cantidad;
                                $insumo->existencia=$insumo->existencia-$request->cantidad;
                                $insumo->save();
                            }
                            //actualizando prestamo
                                
                                $prestamo->id_insumo=$request->id_insumo;
                                $prestamo->tipo=$request->tipo;
                                $prestamo->observacion=$request->observacion;
                                $prestamo->fecha_prestamo=$request->fecha_prestamo;
                                if ($request->tipo=="Entregar") {
                                   $prestamo->status="No Aplica";
                                }
                                
                                $prestamo->cantidad=$request->cantidad;
                                $prestamo->save();
                                
                        if ($request->tipo=="Prestar") {
                        flash('<i class="fa fa-check-circle-o"></i> Préstamo Actualizado exitosamente!')->warning()->important();
                        return redirect()->to('prestamos');
                        } else {
                            flash('<i class="fa fa-check-circle-o"></i> Entrega Actualizada exitosamente!')->warning()->important();
                            return redirect()->to('prestamos');
                        }
                    }
                    
                }
            }    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamos  $prestamos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        //dd($request->all());
        $prestamo=Prestamos::find($request->id_prestamo);
        //dd($prestamo);
        $historial=HistorialPrestamos::where('id_prestamo',$request->id_prestamo)->first();
        //dd($historial);
                    
                $cantidad=$prestamo->cantidad;
                $tipo=$prestamo->tipo;
                //echo $key->id_prestamo."<br>";
                  //actualizando existencias
                $insumo=Insumos::find($prestamo->id_insumo);
                $insumo->in_almacen=$insumo->in_almacen+$cantidad;
                $insumo->disponibles=$insumo->disponibles+$cantidad;

                if ($tipo=="Prestar") {

                $insumo->out_almacen=$insumo->out_almacen-$cantidad;
                    $insumo->save();
                }else{
                    $insumo->entregados=$insumo->entregados-$cantidad;
                    $insumo->existencia=$insumo->existencia+$cantidad;
                    $insumo->save();
                }
            
            $prestamo->delete();
            if($historial!==null){
            $historial->delete();
            }
            
        
        flash('<i class="fa fa-check-circle-o"></i> Préstamo Eliminado exitosamente!')->warning()->important();
        return redirect()->back();

    }

    public function buscar_existencia($id_insumo)
    {
        $insumo=Insumos::find($id_insumo);
        return $insumo->disponibles;
    }

    protected function generarCodigo() {
     $key = '';
     $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $max = strlen($pattern)-1;
     for($i=0;$i < 4;$i++) $key .= $pattern{mt_rand(0,$max)};
     return $key;
    }

    public function historial()
    {
        //\DB::select('SET @@sql_mode=""');
        $historial=HistorialPrestamos::select('codigo','id_prestamo','id','created_at',\DB::raw('codigo'))->where('id','>',0)->groupBy('codigo')->orderBy('id','DESC')->get();

        return view('inventario.prestamos.historial',compact('historial'));
    }

    public function deshacer_prestamo(Request $request)
    {
        //dd($request->all());
        $historial=HistorialPrestamos::where('codigo',$request->codigo)->get();
        //dd($historial);
        foreach ($historial as $key) {
            
                $cantidad=$key->prestamos->cantidad;
                $tipo=$key->prestamos->tipo;
                //echo $key->id_prestamo."<br>";
                  //actualizando existencias
                $insumo=Insumos::find($key->prestamos->id_insumo);
                $insumo->in_almacen=$insumo->in_almacen+$cantidad;
                $insumo->disponibles=$insumo->disponibles+$cantidad;

                if ($tipo=="Prestar") {
                    $insumo->out_almacen=$insumo->out_almacen-$cantidad;
                    $insumo->save();
                }else{
                    $insumo->entregados=$insumo->entregados-$cantidad;
                    $insumo->existencia=$insumo->existencia+$cantidad;
                    $insumo->save();
                }
            $prestamo=Prestamos::find($key->id_prestamo);
            $prestamo->delete();
            $key->delete();
            
        }
        flash('<i class="fa fa-check-circle-o"></i> Préstamo deshecho exitosamente!')->warning()->important();
        return redirect()->back();

    }

    public function cambiar_status(Request $request)
    {
        
        $prestamo = Prestamos::find($request->id_prestamo);
        $cantidad=$prestamo->cantidad;
        $tipo=$prestamo->tipo;
        //echo $key->id_prestamo."<br>";
          //actualizando existencias
            $insumo=Insumos::find($prestamo->id_insumo);

        if ($request->status=="Devuelto") {
            $insumo->in_almacen=$insumo->in_almacen+$cantidad;
            $insumo->out_almacen=$insumo->out_almacen-$cantidad;
            $insumo->disponibles=$insumo->disponibles+$cantidad;
        } else {
            $insumo->in_almacen=$insumo->in_almacen-$cantidad;
            $insumo->out_almacen=$insumo->out_almacen+$cantidad;
            $insumo->disponibles=$insumo->disponibles-$cantidad;
        }
            $insumo->save();
        
        $prestamo->status=$request->status;
        $prestamo->save();

        flash('<i class="fa fa-check-circle"></i> Status del Préstamo cambiado exitosamente a '.$request->status.'!')->success()->important();
        return redirect()->to('prestamos');
    }

    public function detalles_historial($id_prestamo)
    {
        $historial=HistorialPrestamos::where('id_prestamo',$id_prestamo)->first();
        return $prestamos=\DB::table('insumos')->join('prestamos','prestamos.id_insumo','=','insumos.id')->join('solicitantes','solicitantes.id','=','prestamos.id_solicitante')->join('historial_prestamos','historial_prestamos.id_prestamo','prestamos.id')->select('solicitantes.nombres','solicitantes.rut','solicitantes.id','insumos.producto','insumos.descripcion','insumos.serial','prestamos.tipo','prestamos.fecha_prestamo','prestamos.fecha_devuelto','prestamos.status','prestamos.cantidad','prestamos.id')->where('historial_prestamos.codigo',$historial->codigo)->get();
    }
    
}

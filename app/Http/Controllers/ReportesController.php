<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insumos;
use App\Gerencias;
use App\User;
use App\Incidencias;
use App\Prestamos;
use PDF;
use Carbon\Carbon;

date_default_timezone_set('UTC');

ini_set('max_execution_time', 900);
set_time_limit(900);
class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha_actual=date('Y-m-d');
        /*$carbon=Carbon::now();
        //dd($carbon->format('Y-m-d'));
        $fecha = strftime("Hoy es %A día %d de %B");
        dd($fecha);*/
        $gerencias=Gerencias::all();
        $in_almacen=0;
        $out_almacen=0;
        $disponibles=0;
        $entregados=0;
        $usados=0;
        $inservibles=0;
        $insumos=Insumos::all();
        foreach ($insumos as $key) {
            $in_almacen+=$key->in_almacen;
            $out_almacen+=$key->out_almacen;
            $disponibles+=$key->disponibles;
            $entregados+=$key->entregados;
            $usados+=$key->usados;
            $inservibles+=$key->inservible;
        }
        $hoy=date('Y-m-d');
        $usados2=0;
        $inservibles2=0;
        $entregados2=0;
        $out_almacen2=0;
        $incidencias=Incidencias::where('fecha_incidencia',$hoy)->get();

        foreach ($incidencias as $key) {
            if ($key->tipo=="Usados") {
                $usados2+=$key->cantidad;
            } else {
                $inservibles2+=$key->cantidad;
            }
            
        }

        $prestamos=Prestamos::where('fecha_prestamo',$hoy)->get();
        foreach ($prestamos as $key) {
            if ($key->tipo=="Prestar") {
                $out_almacen2+=$key->cantidad;
            } else {
                $entregados2+=$key->cantidad;
            }
            
        }

        /*$usados2=0.1;
        $inservibles2=0.1;
        $entregados2=0;
        $out_almacen2=3;*/
        return view('graficas.index', compact('fecha_actual','gerencias','in_almacen','out_almacen','disponibles','entregados','usados','inservibles','usados2','inservibles2','out_almacen2','entregados2'));
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
        // dd($request->all());
        $gerencia=Gerencias::find($request->id_gerencia);
        $prestamos=Prestamos::whereBetween('fecha_prestamo',[$request->desde,$request->hasta])->get();
        $incidencias=Incidencias::where('id','<>',0)->whereBetween('fecha_incidencia',[$request->desde,$request->hasta])->get();
        $insumos=Insumos::where('id_gerencia', $request->id_gerencia)->get();


        if ($request->generar == 'PDF') {

            if (count($insumos)==0) {
                flash('<i class="icon-circle-check"></i> ¡No exiten datos para generar reporte PDF!')->error()->important();    
                return redirect()->to('reportes');
            } else {
                $pdf = PDF::loadView('graficas/PDF/reportePDF', array(
                    'gerencia'=>$gerencia,
                    'prestamos'=>$prestamos,
                    'incidencias'=>$incidencias,
                    'insumos'=>$insumos,
                ));
                $pdf->setPaper('A4', 'landscape');
                return $pdf->stream('Reporte_PDF.pdf');

            }
        }else{
            $in_almacen=0;
        $out_almacen=0;
        $disponibles=0;
        $entregados=0;
        $usados=0;
        $inservibles=0;
        $insumos=Insumos::all();
        foreach ($insumos as $key) {
            $in_almacen+=$key->in_almacen;
            $out_almacen+=$key->out_almacen;
            $disponibles+=$key->disponibles;
            $entregados+=$key->entregados;
            $usados+=$key->usados;
            $inservibles+=$key->inservible;
        }
        $hoy=date('Y-m-d');
        $usados2=0;
        $inservibles2=0;
        $entregados2=0;
        $out_almacen2=0;
        $incidencias=Incidencias::where('id','<>',0)->whereBetween('fecha_incidencia',[$request->desde,$request->hasta])->get();

        foreach ($incidencias as $key) {
            if ($key->tipo=="Usados") {
                $usados2+=$key->cantidad;
            } else {
                $inservibles2+=$key->cantidad;
            }
            
        }

        $prestamos=Prestamos::whereBetween('fecha_prestamo',[$request->desde,$request->hasta])->get();
        foreach ($prestamos as $key) {
            if ($key->tipo=="Prestar") {
                $out_almacen2+=$key->cantidad;
            } else {
                $entregados2+=$key->cantidad;
            }
            
        }
        }

        return view('graficas.show',compact('in_almacen','out_almacen','disponibles','entregados','usados','inservibles','out_almacen2','entregados2','usados2','inservibles2'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

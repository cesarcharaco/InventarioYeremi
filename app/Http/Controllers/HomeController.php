<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insumos;
use App\Prestamos;
use App\Incidencias;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $insumos=Insumos::all();
        $prestamos=Prestamos::all();
        $incidencias=Incidencias::all();
        $i=count($insumos);
        $p=count($prestamos);
        $in=count($incidencias);
        return view('home',compact('i','p','in'));
    }
}

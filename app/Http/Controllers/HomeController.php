<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insumos;
use App\Local;
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
        $locales=Local::all();
        $incidencias=Incidencias::all();
        $i=count($insumos);
        $in=count($incidencias);
        return view('home',compact('i','in','locales'));
    }
}

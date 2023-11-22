<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalEtarController extends Controller
{
    public function about()
    {
        return view('portal_etar/about');
    }

    public function home()
    {
    	return view('portal_etar/index');
    }

    public function curso2()
    {
    	return view('portal_etar/course-grid-2');
    }

    public function curso3()
    {
    	return view('portal_etar/course-grid-3');
    }

    public function curso4()
    {
    	return view('portal_etar/course-grid-4');
    }

    public function curso5()
    {
    	return view('portal_etar/course-grid-4');
    }

    public function blog()
    {
    	return view('portal_etar/blog');
    }

    public function blogs()
    {
    	return view('portal_etar/blog-single');
    }

    public function profesores()
    {
    	return view('portal_etar/teachers');
    }

    public function contacto()
    {
    	return view('portal_etar/contact');
    }
}

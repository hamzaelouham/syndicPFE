<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenbreController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('is.menbre');
    }
    /*
    *  @return void
    */    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menbre.dashbord');   
    }
}

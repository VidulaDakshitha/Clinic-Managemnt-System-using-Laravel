<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class SweetAlertDemo extends Controller
{
    public function index()
    {
        Alert::message('Robots are working');
        return view('Welcome');
    }
   
    	
    
    //
}

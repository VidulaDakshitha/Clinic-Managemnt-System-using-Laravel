<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeController extends Controller
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
    //
    public function manage()
    {
        $viewName = '/login';
        if(Auth::user()->type === 'patient'){
            // here goes the patient dashbaord route
            $viewName = '/patient';
        }
        else if(Auth::user()->type === 'supplier_manager'){
            $viewName = '/supplier';
        }
        else if(Auth::user()->type === 'inventory_manager'){
            $viewName = '/landingpage';
        }
        else if(Auth::user()->type === 'cashier'){
            $viewName = '/payment';
        }
        else if(Auth::user()->type === 'admin'){
            $viewName = '/admin';
        }

        return redirect($viewName);
    }
}
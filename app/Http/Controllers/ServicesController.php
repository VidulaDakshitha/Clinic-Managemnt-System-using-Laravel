<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
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
        $user_id = auth()->user()->id;
        $users_posts = \App\User::find($user_id)->posts;
        return view('Services')->with('posts', $users_posts);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\User;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $final=Auth::user();
        
        $result = DB::table('patients')->where('email', $final->email)->first();
        return view('PatientManagement.userProfile',compact('result'));
        
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
        //
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
        $post = User::find(Auth::id());
        $post2=Patient::find($id);
        $post->delete();
        $post2->delete();
       return redirect('/')->with('success',' You are deleted successfully...Thanks for joining with IHHR');
        
        if ($post == 1) {
            $success = true;
            //return redirect('/welcome')->with('success',' You are deleted successfully...Thanks for joining with IHHR');
            $message = "User deleted successfully";

        } else {
            $success = true;
            $message = "User not found";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        
    }


}

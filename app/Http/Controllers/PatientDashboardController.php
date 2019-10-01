<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\User;
use Alert;

class PatientDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    var $fianl;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth_patient');
    }


    public function index()
    {
        $final=Auth::user();

        $research = DB::table('patients')->where('email', $final->email)->first();
        
        return view('PatientManagement.patientDashboard',compact('research'));
        //
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
        $result = Patient::findOrFail($id);
        return view('PatientManagement.userProfile',compact('result'));
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

        $request->validate(['fullname' => 'required|string|max:255',
                            'address1' => 'required|string|max:255',
                            'address2' => 'required|string|max:255',
                            'city' => 'required|string|max:255',
                            'nic' => 'required|string|min:10|max:12',
                            'phone' => 'required|integer|min:10',
                            'email' => 'required|string|email|min:10',
        ]);

        // find the patient
        $curr_patient = Patient::findOrFail($id);
        $auth_user = User::where('email', $curr_patient->email)->first();
        
        $curr_patient->fullname = $request->fullname;
        $curr_patient->address1 = $request->address1;
        $curr_patient->address2 = $request->address2;
        $curr_patient->city = $request->city;
        $curr_patient->nic = $request->nic;
        $curr_patient->phone = $request->phone;
        $curr_patient->email = $request->email;
        $auth_user->email = $request->email;
        
        $curr_patient->save();
        $auth_user->save();
        
        return redirect('/patient/'.$id.'/edit')->with('success','ddfdfdfdfdfdfdfdfg Patient details has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        // $post = User::find(Auth::id());
        $post2=Patient::find($id);
        // $post->delete();
        $post2->delete();

        
        return redirect('/');
        //
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Doctor;

class ShowDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    public function search(Request $request)
    {
 
        $search1=$request->get('doctor');
        $search2=$request->get('specialization');

        if($search1=='any doctor' && $search2=='any specialization')
        {
            $posts = Doctor::all();
             return view('PatientManagement.showDoc',compact('posts'));
        }
        else if($search1=='any doctor'){

            $posts=DB::table('doctors')->where('type',$search2)->get();
        return view('PatientManagement.showDoc',compact('posts'));

        }
        else if($search2=='any specialization')
        {
            $posts=DB::table('doctors')->where('fullname',$search1)->get();
        return view('PatientManagement.showDoc',compact('posts'));

        }
        else if($search1!='any doctor' && $search2!='any specialization')
        {
            $posts=DB::table('doctors')->where([['fullname',$search1],['type',$search2]])->get();
        return view('PatientManagement.showDoc',compact('posts'));

        }

        else
        {
            
            return view('patientManagement.showDoc')->with('error','Invalid search results');
        }
      


    }
}

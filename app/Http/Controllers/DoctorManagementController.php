<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\DoctorContact;
use App\DoctorController;
use Illuminate\Http\Request;

class DoctorManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns all doctorss in the doctors table.    
        return view('doctor.manage', ['doctors'=> Doctor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns the view that creates a doctor.
        return view('doctor.create');        
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
        $doctor = new Doctor();
        $doctor->fullName = $request->fullName;
        $doctor->nic = $request->nic;
        $doctor->type = $request->type;
        try{
            $doctor->saveOrFail();
            return view('doctor.create',['success' => 'Entry added succesfully']);
        }catch(\Exception $excpetion){
            //try to categorize the error using the exception. 
            return view('doctor.create',['error' => 'An error occurred!']);
        }
       
        //return view('main.about');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctor.view', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {      
        //dd($doctor);
        $contact_set = DoctorContact::where('doctor_id','=', $doctor->doctor_id)->limit(2)->get();       
        //dd($contact_set[0]);
        return view('doctor.edit', ['doctor' => $doctor, 'contact' => $contact_set]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //validate each value in header.
        //dd($doctor);
        $doctor->update(
            [
                "fullName" => $request->fullname,
                "nic" => $request->nic,
                "type" => $request->type
            ]
        );

        $contact = new DoctorContact();
        $contact->doctor_id = $doctor->doctor_id;

        $contact->contact_number = $request->contact1;
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}

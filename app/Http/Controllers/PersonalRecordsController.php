<?php

namespace App\Http\Controllers;
use App\PersonalRecord;


use Illuminate\Http\Request;

class PersonalRecordsController extends Controller
{
    public function index(Request $request){
        $personal_records = PersonalRecord::all();
        return view('home_per',['personal_records'=>$personal_records]);
    }

    public function add0(Request $request){
        $this->validate($request,[
            'patient_id' => 'required',
            'disease' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);
    
        $personal_records = new PersonalRecord;
        $personal_records->patient_id = $request->input('patient_id');
        $personal_records->disease = $request->input('disease');
        $personal_records->date = $request->input('date');
        $personal_records->description = $request->input('description');
    
        $personal_records->save();
        return redirect('/home_per')->with('info','Record saved successfully!');
    }

    public function edit0(Request $request , $record_id)
    {
        $this->validate($request,[
            'patient_id' => 'required',
            'disease' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);

        $data = array(
            'patient_id' => $request->input('patient_id'),
            'disease' => $request->input('disease'),
            'date' => $request->input('date'),
            'description' => $request->input('description')
        );

        PersonalRecord::where('record_id',$record_id)
        ->update($data);
        return redirect('/home_per')->with('info','Record saved successfully!');
    }

    public function update0($record_id)
    {
        $personal_records = PersonalRecord::where($record_id);
        return view('update_per',['personal_records'=>$personal_records]);
        
    }

    public function read0($record_id){
        $personal_records = PersonalRecord::where($record_id);
        return view('read_per',['personal_records'=>$personal_records]);
    }

    public function delete0($id){
        PersonalRecord::where('record_id','$id')
        ->delete();
        return redirect('/home_per')->with('info','Record deleted successfully!');
    }
}



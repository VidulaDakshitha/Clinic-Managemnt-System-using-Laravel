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

      
        $personal_record = PersonalRecord::find($record_id);
        $personal_recordt->patient_id = $request->patient_id;
        $personal_record->disease = $request->disease;
        $personal_record->date = $request->date;
        $personal_record->description = $request->description;

        $personal_record->save();
        return redirect('/home_per')->with('success','Updated');
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



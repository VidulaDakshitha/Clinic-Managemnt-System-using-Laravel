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

    public function edit0($id)
    {
        $personal_records = PersonalRecord::findOrFail($id);

        return view('update_per', compact('personal_records'));
    }

    public function update0(Request $request, PersonalRecord $personal_records)
    {
        $personal_records->patient_id = $request->input('patient_id');
        $personal_records->disease = $request->input('disease');
        $personal_records->date = $request->input('date');
        $personal_records->description = $request->input('description');
    
        $personal_records->save();
        return redirect('/home_per')->with('info','records updated successfully!');
    }

    public function read0($id){
        $personal_records = PersonalRecord::find($id);
        return view('read_per',['personal_records'=>$personal_records]);
    }

    public function delete0($id){
        PersonalRecord::where('record_id','$id')
        ->delete();
        return redirect('/home_per')->with('info','Record deleted successfully!');
    }
}



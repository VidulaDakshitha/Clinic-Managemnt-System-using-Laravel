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

    public function update0(PersonalRecord $personal_record)
    {
        return view('update_per',compact('personal_record'));
    }

    public function edit0(Request $request, PersonalRecord $personal_record)
    {
        $request->validate([
            'patient_id' => 'required|numeric|max:6',
            'disease' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);
  
        $personal_record->update($request->all());
  
        return redirect('home_per')->with('success','Personal Record updated successfully');
    }

    public function show(PersonalRecord $personal_record,$id)
    {
        $personal_records = PersonalRecord::where('record_id',$id);
        return view('read_per',compact('personal_record'));
    }

    public function destroy($id)
    {
        $personal_record = PersonalRecord::where('record_id',$id);
        $personal_record->delete();
  
        return redirect('home_per')->with('success','Record deleted successfully');
    }

}    
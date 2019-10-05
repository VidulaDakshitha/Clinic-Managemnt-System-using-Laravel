<?php

namespace App\Http\Controllers;
use App\PersonalRecord;

use DB;
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

    public function update0($id)
    {
        $personal_record = PersonalRecord::where('record_id',$id)->first();
        return view('update_per',compact('personal_record'));
    }

    public function edit0(Request $request,$id)
    {
        $request->validate([
            'patient_id' => 'required|numeric|max:6',
            'disease' => 'required',
            'date' => 'required',
            'description' => 'required'
        ]);
  
        $personal_record = PersonalRecord::where('record_id',$id)->first();
        $personal_record->patient_id = $request->input('patient_id');
        $personal_record->disease = $request->input('disease');
        $personal_record->date = $request->input('date');
        $personal_record->description = $request->input('description');
    
        $personal_record->save();
        return redirect('home_per')->with('success','Personal Record updated successfully');
    }

    public function show($id)
    {
        $personal_record = PersonalRecord::where('record_id',$id)
                                            ->first();
        return view('read_per',compact('personal_record'));
    }

    public function read(PersonalRecord $personal_record)
    {
        
        return view('read_personal',compact('personal_record'));
    }

    public function destroy($id)
    {
        $personal_record = PersonalRecord::where('record_id',$id);
        $personal_record->delete();
  
        return redirect('home_per')->with('success','Record deleted successfully');
    }

    public function reports()
    {
        $personal_records =PersonalRecord::paginate(10);
        return view('report_per', compact('personal_records'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $personal_records = DB::table('personal_records')->where('record_id','like', '%'.$search.'%')
                                         ->orwhere('disease','like','%'.$search.'%')
                                         ->orwhere('patient_id','like','%'.$search.'%')
                                         ->paginate(10);
        return view('report_per', ['personal_records' => $personal_records]);
    }

}    
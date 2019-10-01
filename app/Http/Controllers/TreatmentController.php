<?php

namespace App\Http\Controllers;
use App\TreatmentRecord;

use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function home1(Request $request){
        $treatment_records = TreatmentRecord::all();
        return view('home_treat',['treatment_records'=>$treatment_records]);
    }

    public function add1(Request $request){
        $this->validate($request,[
            'date' => 'required',
            'description' => 'required'
        ]);
    
        $treatment_records = new TreatmentRecord;
        $treatment_records->date = $request->input('date');
        $treatment_records->description = $request->input('description');
    
        $treatment_records->save();
        return redirect('/home_treat')->with('info','records saved successfully!');
    }

    public function edit1($id)
    {
        $treatment_records = TreatmentRecord::findOrFail($id);

        return view('update_treat', compact('treatment_records'));
    }

    public function update1(Request $request, TreatmentRecord $treatment_records)
    {
        $treatment_records->date = $request->input('date');
        $treatment_records->description = $request->input('description');
    
        $treatment_records->save();
        return redirect('/home_treat')->with('info','records updated successfully!');
    }

    public function read1($id){
        $treatment_records = TreatmentRecord::find($id);
        return view('read_treat',['treatment_records'=>$treatment_records]);
    }

    public function delete1($id){
        TreatmentRecord::where('record_id','$id')
        ->delete();
        return redirect('/home_treat')->with('info','Record deleted successfully!');
    }
}

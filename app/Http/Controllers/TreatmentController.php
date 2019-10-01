<?php

namespace App\Http\Controllers;
use App\TreatmentRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index1(Request $request){
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
        return redirect('/home_treat')->with('info','Treatment record saved successfully!');
    }

    public function update1(TreatmentRecord $treatment_record)
    {
        return view('update_treat',compact('treatment_record'));
    }

    public function edit1(Request $request, TreatmentRecord $treatment_record)
    {
        $request->validate([
            'date' => 'required',
            'description' => 'required'
        ]);
  
        $$treatment_record->update($request->all());
  
        return redirect('home_treat')->with('success','Treatment updated successfully');
    }

    public function show(TreatmentRecord $treatment_record)
    {
        return view('read_treat',compact('treatment_record'));
    }

    public function destroy(TreatmentRecord $treatment_record)
    {
        $treatment_record->delete();
  
        return redirect('/home_treat')->with('success','Treatment Record deleted successfully');
    }

}
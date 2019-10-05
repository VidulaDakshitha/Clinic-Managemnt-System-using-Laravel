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

    public function update1($id)
    {
        $treatment_record = TreatmentRecord::where('record_id',$id)->first();
        return view('update_treat',compact('treatment_record'));
    }

    public function edit1(Request $request,$id)
    {
        $request->validate([
            'date' => 'required',
            'description' => 'required'
        ]);
        
        $treatment_record = TreatmentRecord::where('record_id',$id)->first();
       
        $treatment_records->date = $request->input('date');
        $treatment_records->description = $request->input('description');
    
        $treatment_records->save();
  
        return redirect('home_treat')->with('success','Treatment updated successfully');
    }

    public function show($id)
    {
        $treatment_record = TreatmentRecord::where('record_id',$id)
                                                       ->first();
        return view('read_treat',compact('treatment_record'));
    }

    public function read($id)
    {
        $treatment_record = TreatmentRecord::where('record_id',$id)
                                                        ->first();
        return view('read_treatment',compact('treatment_record'));
    }

    public function destroy(TreatmentRecord $treatment_record,$id)
    {
        $treatment_record = TreatmentRecord::where('record_id',$id);
        $treatment_record->delete();
  
        return redirect('/home_treat')->with('success','Treatment Record deleted successfully');
    }

    public function reports()
    {
        $treatment_records =TreatmentRecord::paginate(10);
        return view('report_treat', compact('treatment_records'));
    }

    public function search(Request $request)
    {
    $search = $request->get('search');
    $treatment_records = DB::table('treatment_records')->where('record_id','like', '%'.$search.'%')
                                     ->orwhere('date','like','%'.$search.'%')
                                     ->orwhere('description','like','%'.$search.'%')
                                     ->paginate(10);
    return view('report_treat', ['treatment_records' => $treatment_records]);
    }
}
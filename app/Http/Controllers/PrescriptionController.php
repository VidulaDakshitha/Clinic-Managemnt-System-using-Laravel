<?php

namespace App\Http\Controllers;
use App\Prescription;
use DB;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function home2(Request $request){
        $prescriptions = Prescription::all();
        return view('home_prescription',['prescriptions'=>$prescriptions]);
    }

    public function add2(Request $request){
        $this->validate($request,[
            'doctor_id'=>'required',
            'patient_id' => 'required',
            'description' => 'required'
        ]);
    
        $prescriptions = new Prescription;
        $prescriptions->doctor_id = $request->input('doctor_id');
        $prescriptions->patient_id = $request->input('patient_id');
        $prescriptions->description = $request->input('description');
    
        $prescriptions->save();
        return redirect('/home_prescription')->with('info','prescription saved successfully!');
    }

    public function edit2($id)
    {
        $prescription = Prescription::find($id);

        return view('update_prescription', compact('prescription'));
    }

    public function update2(Request $request, $id)
    {
        $this->validate([
            'doctor_id'=>'required',
            'patient_id' => 'required',
            'description' => 'required'
        ]);

        $prescription = Prescription::find($id);
        $prescription->doctor_id = $request->input('doctor_id');
        $prescription->patient_id = $request->input('patient_id');
        $prescription->description = $request->input('description');

        $prescription->save();
        return redirect('/home_prescription')->with('success','Prescription Updated');
    }

    public function show(Prescription $prescription,$id)
    {
        $prescription = Prescription::find($id);
        return view('read_prescription',compact('prescription'));
    }

    public function destroy(Prescription $prescription,$id)
    {
        $prescription = Prescription::find($id);
        $prescription->delete();
  
        return redirect('/home_prescription')->with('success','Prescription deleted successfully');
    }

    public function reports()
    {
        $prescriptions =Prescription::paginate(10);
        return view('report_prescription', compact('prescriptions'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $prescriptions = DB::table('prescriptions')->where('id','like', '%'.$search.'%')
                                         ->orwhere('doctor_id','like','%'.$search.'%')
                                         ->orwhere('patient_id','like','%'.$search.'%')
                                         ->paginate(10);
        return view('report_prescription', ['prescriptions' => $prescriptions]);
    }
}
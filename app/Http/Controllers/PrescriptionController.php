<?php

namespace App\Http\Controllers;
use App\Prescription;

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

    public function update2($id)
    {
        $prescription = Prescription::find($id);
        return view('update_prescription',compact('prescription'));
    }

    public function edit2(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'description' => 'required'
        ]);
  
        $prescription = Prescription::find($id);
        $prescription->doctor_id = $request->doctor_id;
        $prescription->patient_id = $request->patient_id;
        $prescription->description = $request->description;

        $prescription->save();
  
        return redirect('/home_prescription')->with('success','Prescription updated successfully');
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

}
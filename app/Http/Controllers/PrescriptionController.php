<?php

namespace App\Http\Controllers;
use App\Prescription;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function home2(){
        $prescriptions = Prescription::all();
        return view('home_prescription',['prescription'=>$prescriptions]);
    }

    public function add2(Request $request){
        $this->validate($request,[
            'doctor_id'=>'equired',
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
        $prescriptions = Prescription::findOrFail($id);

        return view('update_prescription', compact('prescriptions'));
    }

    public function update2(Request $request, prescription $prescriptions)
    {
        $prescriptions->doctor_id = $request->input('doctor_id');
        $prescriptions->patient_id = $request->input('patient_id');
        $prescriptions->description = $request->input('description');
    
        $prescriptions->save();
        return redirect('/home_prescription')->with('info','prescription updated successfully!');
    }

    public function read2($id){
        $prescriptions = Prescription::find($id);
        return view('read_prescription',['prescriptions'=>$prescriptions]);
    }

    public function delete2($id){
        Prescription::where('id','$id')
        ->delete();
        return redirect('/home_prescription')->with('info','Prescription deleted successfully!');
    }
}

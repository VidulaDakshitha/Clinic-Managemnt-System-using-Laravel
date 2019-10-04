<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PatientPDFController extends Controller
{

    function index()
    {
        $patient_data=$this->get_patient_data();
        return view('Patient_pdf')->with('patient_data',$patient_data);

    }

    function get_patient_data()
    {
        $patient_data=DB::table('patients')
        ->limit(10)
        ->get();

        return $patient_data;
    }

    function pdf()
    {
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->
            convert_patient_data_to_html());
        return $pdf->stream();
    }

    function convert_patient_data_to_html()
    {
        $patient_data=$this->get_patient_data();

        $output='
        <h3 align="center>Registered Patients</h3>
        <table>
         <h3>Registered Patients</h3>
       <table>

        <tr>
            <th>patientID</th>
            <th>Full name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>NIC</th>
            <th>Address1</th>
            <th>Address2</th>
            <th>City</th>
            <th>phone</th>
            <th>Email</th>
        
        
        </tr>
        ';

        foreach ($patient_data as $patient)
        {
            $output .= '
            
                    <tr>
                        <td>'.$patient->patient_id.'</td>
                        <td>'.$patient->fullname.'</td>
                        <td>'.$patient->gender.'</td>
                        <td>'.$patient->dob.'</td>
                        <td>'.$patient->nic.'</td>
                        <td>'.$patient->address1.'</td>
                        <td>'.$patient->address2.'</td>
                        <td>'.$patient->city.'</td>
                        <td>'.$patient->phone.'</td>
                        <td>'.$patient->email.'</td>
                    </tr>
            ';
        }

        $output .= '</table>';
        return $output;
    }
}

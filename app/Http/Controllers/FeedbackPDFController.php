<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feedback;
use DB;
use PDF;

class FeedbackPDFController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth', ['except' => ['show']]);
    }
    function index()
    {
     $feedback_data = $this->get_feedback_data();
     return view('chairman.feedback_pdf')->with('feedback_data', $feedback_data);
    }

    function get_feedback_data()
    {
     $feedback_data = DB::table('feedback')
         ->limit(50)
         ->get();
     return $feedback_data;
    }

    public function search_feedback_data($patient_id)
    {
     $feedback_data = feedback::latest()->where('patient_id', 'like', '%'.$patient_id.'%')->paginate(50);
     return $feedback_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_feedback_data_to_html());
     return $pdf->stream();
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $feedback_data = DB::table('feedback')->where('patient_id','like', '%'.$search.'%')->paginate(50);
        return view('chairman.feedback_pdf', ['feedback_data' => $feedback_data]);
    }

    public function pdf_fedsearch(Request $request)
    {
        $patient_id = $request->get('patient_id');   
        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($this->feedback_search_to_html($patient_id));
        return $pdf->stream();
    }

    function convert_feedback_data_to_html()
    {
     $feedback_data = $this->get_feedback_data();
     $output = '
     <h3 align="center">Feedback Report</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Patient ID</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Message</th>
   </tr>
     ';  
     foreach($feedback_data as $feedback)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$feedback->patient_id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$feedback->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$feedback->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$feedback->message.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }

    function feedback_search_to_html($patient_id)
    {
     $feedback_data = $this->search_feedback_data($patient_id);
     $output = '
     <img src="images/main/mainlayout/logo_dark_long.png">
     <h3 align="center">Feedback Report</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Patient ID</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Message</th>
   </tr>
     ';  
     foreach($feedback_data as $feedback)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$feedback->patient_id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$feedback->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$feedback->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$feedback->message.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }

    
}

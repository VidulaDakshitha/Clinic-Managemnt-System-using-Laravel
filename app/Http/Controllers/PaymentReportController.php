<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\payment;

use PDF;

use DB;

class PaymentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = payment::latest()->paginate(30);
        return view('payment.paymentReport', compact('payments'))
                 ->with('i', (request() -> input ('page', 1)-1)*10);
    }

    public function get_payment_data()
    {
     $payment_data = DB::table('payments')
         ->limit(30)
         ->get();
     return $payment_data;
    }

    public function search_payment_data($patientID)
    {
     $payment_data = payment::latest()->where('patientID', 'like', '%'.$patientID.'%')->paginate(10);
     return $payment_data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($this->payment_details_to_html());
        return $pdf->stream();
    }

    public function pdf_search(Request $request)
    {
        $patientID = $request->get('patientID');   
        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($this->payment_search_to_html($patientID));
        return $pdf->stream();
    }

    public function payment_details_to_html()
    {
        $payment_data = $this->get_payment_data();
        $output = '
        <h3 align="center">Payment Details</h3>
                <table>
                    <tr>
                    <th width = "50px"><b>No.</b></th>
                    <th width = "100px">Patient ID</th>
                    <th width = "200px">Payment For</th>
                    <th width = "200px">Amount(LKR.)</th>
                    <th width = "200px">Date</th>
                    
                    </tr>
                    <br>
        ';
                        
        foreach ($payment_data as $payment) 
        {
            $output .= '
                <tr>
                    <td><b>'.$payment -> id.'</b></td>
                    <td>'.$payment->patientID.'</td>
                    <td>'.$payment->paymentFor.'</td>
                    <td>'.$payment->amount.'</td>
                    <td>'.$payment->date.'</td>
                </tr>
            ';
        }
        
        $output .= '</table>';
        return $output;
    }

    
    public function payment_search_to_html($patientID)
    {
        $payment_data = $this->search_payment_data($patientID);
        $output = '
        <h3 align="center">Payment Details For '.$patientID.'</h3>
                <table>
                    <tr>
                    <th width = "50px"><b>No.</b></th>
                    <th width = "100px">Patient ID</th>
                    <th width = "200px">Payment For</th>
                    <th width = "200px">Amount(LKR.)</th>
                    <th width = "200px">Date</th>
                    
                    </tr>
                    <br>
        ';
                        
        foreach ($payment_data as $payment) 
        {
            $output .= '
                <tr>
                    <td><b>'.$payment -> id.'</b></td>
                    <td>'.$payment->patientID.'</td>
                    <td>'.$payment->paymentFor.'</td>
                    <td>'.$payment->amount.'</td>
                    <td>'.$payment->date.'</td>
                </tr>
            ';
        }
        
        $output .= '</table>';
        return $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

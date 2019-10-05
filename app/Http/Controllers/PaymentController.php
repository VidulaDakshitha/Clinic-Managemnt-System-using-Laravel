<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\payment;

use App\card;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth_cashier');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = payment::latest()->paginate(10);
        $cards = card::latest()->paginate(10);
        return view('payment.index', compact('payments', 'cards'))
                 ->with('i', (request() -> input ('page', 1)-1)*10);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Array = ["", "", "", ""];
        return view('payment.create', compact('Array'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'patientID' => 'required',
            'paymentFor' => 'required',
            'amount' => 'required',
            'date' => 'required'
            
        ]);

        payment::create($request->all());

        return redirect()->route('payment.index')
                ->with('success', 'New payment added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = payment::find($id);
        return view('payment.detail', compact('payment'));
    }

    public function search(Request $request)
    {
        $patientID = $request->get('patientID');
        $payments = payment::latest()->where('patientID', 'like', '%'.$patientID.'%')->paginate(10);
        $cards = card::latest()->paginate(10);

        return view('payment.index',compact('payments', 'cards'))
                ->with('i', (request() -> input ('page', 1)-1)*10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = payment::find($id);
        return view('payment.edit', compact('payment'));
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
        $request -> validate([
            'patientID' => 'required',
            'paymentFor' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        $payment = payment::find($id);
        $payment->patientID = $request->get('patientID');
        $payment->paymentFor = $request->get('paymentFor');
        $payment->amount = $request->get('amount');
        $payment->date = $request->get('date');
        $payment->save();

        return redirect()->route('payment.index')
                ->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = payment::find($id);
        $payment->delete();

        return redirect()->route('payment.index')
                ->with('success', 'Payment deleted successfully');
    }

    public function demo()
    {
        $Array = ["01", "Doctor Visited", "1000", "10/06/2019"];
        return view('payment.create', compact('Array'));
    }    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientPriscriptionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function show()
    {
        $id=Auth()->id();

        $userspricriptions = DB::table('prescriptions')
        ->where('prescriptions.patient_id',$id)
        ->join('doctors','doctors.doctor_id','prescriptions.doctor_id')
        ->join('prescribed_products','prescribed_products.prescription_id','prescriptions.id')
       // ->join('products', 'prescriptions.id', '=', 'products.prescription_id')
        ->join('products', 'prescribed_products.product_type_id', '=', 'products.product_id')
        ->select('products.name','products.product_id','products.selling_price', 'prescriptions.id','doctors.fullname')
       ->get();



            return view('product_order_system.UserPriscriptionView',['userspricriptions'=>$userspricriptions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $id=Auth()->id();
        $searchtxt=$request->get('searchtext');
        $searchtype=$request->get('searchtype');

        $userspricriptions = DB::table('prescriptions')
                   ->where('prescriptions.patient_id',$id)
                   ->join('doctors','doctors.doctor_id','prescriptions.doctor_id')
                   ->join('prescribed_products','prescribed_products.prescription_id','prescriptions.id')
       // ->join('products', 'prescriptions.id', '=', 'products.prescription_id')
                   ->join('products', 'prescribed_products.product_type_id', '=', 'products.product_id')
                   ->select('products.name','products.product_id','products.selling_price', 'prescriptions.id','doctors.fullname')
                   ->where($searchtype,'like','%'.$searchtxt.'%')
                   ->get();
      // dd($userspricriptions);

            return view('product_order_system.UserPriscriptionView',['userspricriptions'=>$userspricriptions]);

    }



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

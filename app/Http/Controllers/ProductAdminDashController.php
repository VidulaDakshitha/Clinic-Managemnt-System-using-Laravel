<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductAdminDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $totalorders= DB::table('orders')
        ->count('order_id');

        $waitingorders= DB::table('orders')
        ->where('status', 'waiting')
        ->count('order_id');

        $readydorders= DB::table('orders')
        ->where('status', 'ready')
        ->count('order_id');


        $shipedorders= DB::table('orders')
        ->where('status', 'shiped')
        ->count('order_id');


        $order= DB::table('orders')
                ->join('order_product','order_product.order_id','=','orders.order_id')
                ->select('orders.order_id','orders.patient_id','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
                ->get();



        //dd('total order ='.$totalorders.' waiting ='.$waitingorders.' ready ='.$readydorders.' shiped ='.$shipedorders);

        return view('product_order_system.OrderDashborad',['order'=>$order])
        ->with('success','Data updated')
        ->with('total',$totalorders)
        ->with('ready',  $readydorders)
        ->with('shiped',  $shipedorders)
        ->with('waiting', $waitingorders);



    }

    public function search(Request $request){
        $keyword=$request->get('dashsearchtxt');
        $type=$request->get('dashsearchtype');


        $totalorders= DB::table('orders')
        ->count('order_id');

        $waitingorders= DB::table('orders')
        ->where('status', 'waiting')
        ->count('order_id');

        $readydorders= DB::table('orders')
        ->where('status', 'ready')
        ->count('order_id');


        $shipedorders= DB::table('orders')
        ->where('status', 'shiped')
        ->count('order_id');


        $order= DB::table('orders')
                ->join('order_product','order_product.order_id','=','orders.order_id')
                ->select('orders.order_id','orders.patient_id','orders.date','orders.status','orders.total_payment','order_product.product_id','order_product.product_id','order_product.quantity')
                ->where($type,'like','%'.$keyword.'%')
                ->get();


        return view('product_order_system.OrderDashborad',['order'=>$order])
             ->with('success','Data updated')
             ->with('total',$totalorders)
             ->with('ready',  $readydorders)
             ->with('shiped',  $shipedorders)
             ->with('waiting', $waitingorders);


    }

    public function updatesatus(Request $request){

        $admindash_status =$request->get('admindash_status');
        $order_id =$request->get('order_id');


        DB::table('orders')->where('order_id', $order_id)
                           ->update(['status' => $admindash_status]);




    return $this->index();




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

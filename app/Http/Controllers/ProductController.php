<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderProduct;
use App\Product;
use Carbon\Carbon as CarbonCarbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function getAddToCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$product->product_id);

        $request->session()->put('cart', $cart);
        //dd( $request->session()->get('cart'));
        return redirect('/search-product');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
         //  return view('product_order_system.ShoppingCart',['orderlist'=>null]);
         return redirect('/search-product');

        }else{
        $getuser_email= Auth::user()->email;

        $user_address= DB::table('patients')
                        ->select('address1')
                        ->where('email',$getuser_email)->get();

           $address=(string)$user_address[0]->address1;
         //  dd(gettype($user_address));

        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
         // dd($cart->items);

        return view('product_order_system.ShoppingCart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQuntity'=>$cart->totalQty])
        ->with('address',$address);

     }
    }

    public function getReduceByone($id){
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeitembyone($id);
        Session::put('cart',$cart);
        return redirect()->route('product.show-cart');

    }

    public function getcheckout()
    {

        if(!Session::has('cart')){
           return redirect('/search-product');

           }else{
           $oldCart=Session::get('cart');
           $cart=new Cart($oldCart);
           $products=$cart->items;
           $totalprderprice=$cart->totalPrice;


           $userId = Auth::id();
           $date = CarbonCarbon::now();



            $order=new Order([
                'patient_id'=>$userId,
                'date'=>$date,
                'status'=>'waiting',
                'total_payment'=>$totalprderprice
            ]);

            $order->save();

            $latsorderid=DB::table('orders')
                            ->select('order_id')
                            ->orderBy('order_id','DESC')
                            ->first()->order_id;


            //dd('user id:'. $userId.' date :'.$date);
           // $product=$cart->items;

           foreach( $products as $product ){

           // DB::table('order_product')->insert([

           //     ['order_id'=>1],
           //     ['product_id'=>$product['item']['product_id']],
           //     ['quantity'=>$product['qty']],
           //     ['price'=>$product['item']['selling_price']]

           //     ]);

           $product_order=new OrderProduct([
            'order_id'=> $latsorderid,
            'product_id'=>$product['item']['product_id'],
            'quantity'=>$product['qty'],
            'price'=>$product['item']['selling_price']
           ]);
           $product_order->save();

            }

            DB::table('products')
            ->where('product_id',$product['item']['product_id'])
            ->decrement('quantity', $product['qty']);

           Session::forget('cart');

           

          // return redirect('/search-product')->with('order_placed','Order placed sucsessfuly');
          return view('payment.paymentCard')->with('userId', $userId)
                                              ->with('totalprderprice',$totalprderprice)
                                              ->with('order_placed','Order placed sucsessfuly')
                                             ->with('latsorderid',$latsorderid);

        }

    }



}

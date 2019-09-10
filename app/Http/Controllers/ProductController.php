<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Session;
use Illuminate\Http\Request;


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
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        //$cart_list = $cart;
       // dd($cart->items);
        return view('product_order_system.ShoppingCart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQuntity'=>$cart->totalQty]);

     }
    }

    public function getReduceByone($id){
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeitembyone($id);
        Session::put('cart',$cart);
        return redirect()->route('product.show-cart');

    }


    public function getcheckout(){

        if(!Session::has('cart')){
           // return view('product_order_system.ShoppingCart',['orderlist'=>null]);
           return redirect('/search-product');

        }else{
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);
          //  $total=$cart->totalPrice;
           // return view('paymet',['total'=>$total]);

            Session::forget('cart');
            return redirect('/search-product');
        }


    }


}

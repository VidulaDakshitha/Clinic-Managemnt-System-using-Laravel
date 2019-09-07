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
        return redirect('/search');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
            return view('product_order_system.ShoppingCart',['orderlist'=>null]);

        }else{
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        //$cart_list = $cart;
       // dd($cart->items);
        return view('product_order_system.ShoppingCart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQuntity'=>$cart->totalQty]);

    }
}


}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth_inventory');
    }


    public function index()
    {
        $products = Product::all();
        return view('product.productdashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$products = Product::all();
        //return view('product.createproduct', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasFile('image')){
            $fullFileName = $request->image->getClientOriginalName();
            $file = pathinfo($fullFileName, PATHINFO_FILENAME);
            $ext = $request->image->getClientOriginalExtension();

            $fileName = $file.'_'.time().'_'.$ext;

            $path = $request->image->storeAs('public/product_images', $fileName);
        }
        else{
            $fileName = "noimage.jpg";
        }

        $addItem = new Product();

        $addItem->name          = $request->input('name');
        $addItem->selling_price = $request->input('selling_price');
        $addItem->quantity      = $request->input('quantity');
        $addItem->potency       = $request->input('potency');
        $addItem->expiry_date   = $request->input('expiry_date');
        $addItem->brand         = $request->input('brand');
        $addItem->description   = $request->input('description');
        $addItem->type          = $request->input('type');
        $addItem->image         = $fileName;
        
        $addItem->save();

        return redirect('/product')->with('success', 'Product added Successfully!' );
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
        $product = Product::findOrFail($id);

        return view('product.update', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name            = $request->name;
        $product->selling_price   = $request->selling_price;
        $product->quantity        = $request->quantity;
        $product->potency         = $request->potency;
        $product->expiry_date     = $request->expiry_date;
        $product->brand           = $request->brand;
        $product->description     = $request->description;
        $product->type            = $request->type;
        $product->image           = $request->image;

        $product->save();

        return redirect('/product')->with('success', 'Product updated Successfully!' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/product')->with('success','Product deleted Successfully!');
    }
}
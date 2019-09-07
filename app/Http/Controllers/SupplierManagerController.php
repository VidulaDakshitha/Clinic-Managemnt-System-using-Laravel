<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\SupplierContact;
use App\SupplierEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();
        return view('backend.supplier.supplierdashboard', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('backend.supplier.create', compact('products'));
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
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|numeric',
            'address' => 'required|string',
            'address2' => 'nullable|string',
            'city' => 'required|string',
            'postal_code' => 'required|numeric',
            'product' => 'required',
        ]);

       $supplier = new Supplier();
       $supplier->name =$request->name;                          
       $supplier->location =$request->address. ' '.$request->address2.' '.$request->postal_code.' '.$request->city;                          
                              
       if($supplier->save()){
        $product = DB::table('products')->where('type', $request->product)->first();  
        $supplier->products()->attach($product->product_id);
       }
                   

       $sup_contacts = new SupplierContact();
       $sup_contacts->supplier_id = $supplier->supplier_id;
       $sup_contacts->contact_number = $request->contact_number; 
       $sup_contacts->save();

       $sup_emails = new SupplierEmail();
       $sup_emails->supplier_id = $supplier->supplier_id;
       $sup_emails->email = $request->email; 
       $sup_emails->save(); 

       return redirect('/supplier')->with('success','New Supplier Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
        $products = Product::all();
        return view('backend.supplier.edit', compact('supplier', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
        $supplier->delete();
        return redirect('/supplier')->with('success','Successfully deleted supplier');
    }
}
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
           foreach($request->product as $prod){
            $product = DB::table('products')->where('type', $prod)->first();  
            $supplier->products()->attach($product->product_id);
           }
       }
       $sup_contacts = new SupplierContact();
       $sup_contacts->supplier_id = $supplier->supplier_id;
       $sup_contacts->contact_number = $request->contact_number; 
       $supplier->suppliercontacts()->save($sup_contacts);
       
       $sup_emails = new SupplierEmail();
       $sup_emails->supplier_id = $supplier->supplier_id;
       $sup_emails->email = $request->email; 
       $supplier->supplieremails()->save($sup_emails);

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
        return view('backend.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $selected=$supplier->products;
        $products = Product::all();

        foreach ($supplier->products as $selected_key => $selected_product) {
            
            foreach ($products as $key => $product) {
                if($selected_product->type == $product->type){
                    unset($products[$key]);
                }
            }
        }
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
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|numeric',
            'address' => 'required|string',
            'product' => 'required',
        ]);
        if(count($request->product)<=0) {
            return redirect()->back()->with(['error'=>'No products selected']);
        }
       $supplier->name =$request->name;                          
       $supplier->location =$request->address;                          
                              
       if($supplier->save()){
        $supplier->products()->detach();
        
        foreach($request->product as $prod){
            $product = DB::table('products')->where('type', $prod)->first();  
            $supplier->products()->attach($product->product_id);
        }
       }
       $sup_contacts = $supplier->suppliercontacts->first();
       $sup_contacts->supplier_id = $supplier->supplier_id;
       $sup_contacts->contact_number = $request->contact_number; 
       $supplier->suppliercontacts()->save($sup_contacts);
       
       $sup_emails = new SupplierEmail();
       $sup_emails->supplier_id = $supplier->supplieremails->first();
       $sup_emails->email = $request->email; 
       $supplier->supplieremails()->save($sup_emails);

       return redirect('/supplier')->with('success','Supplier updated');
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
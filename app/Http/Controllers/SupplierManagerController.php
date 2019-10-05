<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Supplier;
use App\User;
use App\SupplierContact;
use App\SupplierEmail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Hash;
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
        $this->middleware('auth_supp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = Supplier::paginate(8);
        if(Auth::user()->type == 'supplier_manager')return view('backend.supplier.supplierdashboard', compact('suppliers'));
        else if(Auth::user()->type == 'inventory_manager') return view('backend.supplier.viewonlydashboard', compact('suppliers'));
        else {
            Auth::logout();
            return redirect('/login')->with(["error"=>"Access Denied!, Please login with proper credentials."]);
        }
    }

    public function reports()
    {
        $suppliers = Supplier::all();
        return view('backend.supplier.reports', compact('suppliers'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('backend.supplier.settings', compact('user'));
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.supplier.product', compact('product'));
    }
    // search for a supplier
    public function search(Request $request)
    {
        if($request->keywords === "all"){
            $result = Supplier::with(['products'])->get();
        }
        else{
            
            if($request->column === "products"){
                $result = Supplier::with(['products'])->whereHas("products", function($q)use($request){
                     $q->where("name", "LIKE", "%$request->keywords%");})->get();            
            }
            else if($request->column === "and"){
                $result = Supplier::with(['products'])->whereHas("products", function($q)use($request){
                    $q->where("name", "LIKE", "%$request->keywordProduct%");})->where("location","LIKE", "%$request->keywordLocaton%")->get();      
            }else {
                $result = Supplier::where($request->column, 'LIKE', "%$request->keywords%")->with(['products'])->get();
            }
        }
        //$result = Supplier::all();
        return response()->json($result);
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
            $product = DB::table('products')->where('name', $prod)->first();  
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
                if($selected_product->name == $product->name){
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
            $product = DB::table('products')->where('name', $prod)->first();  
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

    public function supplierdetails(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'currentPassword' => 'required',
            'newPassword' => 'required'
        ]);

        if(Hash::check($request->currentPassword,Auth::user()->password)) {
            
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return redirect()->back()->with(['success' => 'User information changed successfully...']);
        } else {
            return redirect()->back()->with(['error' => 'Password did not match...']);
        }

    }
}
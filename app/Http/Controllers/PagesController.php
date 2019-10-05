<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Alert;
use Mail;
use Session;
use App\Contact;

class PagesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['contact2','postcontact2','show']]);
    }

    public function index()
    {
       Alert::message('Robots are Working!');
        return view('welcome');
    }

    public function adhome()
    {
        return view('AdminHome');
    }

    public function about()
    {
        return view('chairman.aboutus');
    }

    public function fed()
    {
        return view('feedbackform.feed');
    }
    public function contact()
    {
        return view('PatientManagement.contactus');
    }

    public function postcontact(Request $request)
    {
        $this->validate($request,['email'=>'required|email',
        'message=>min:10','phone=>min:10']);

        $data=array(
            'name'=>$request->name,
             'email' =>$request->email,
             'phone'=>$request->phone,
             'bodymessage'=>$request->message
    
        );

        Mail::send('emails.contact',$data,function($message)use($data){

            $message->from($data['email']);
            $message->to('viduladakshitha@gmail.com');
            $message->subject($data['phone']);
        });

        if((auth()->user())!=null)
        {
        $contact = new Contact();
        $contact->patient_id = auth()->user()->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone=$request->phone;
        $contact->message = $request->message;
        $contact->save();
        }

        return redirect('/contact')->with('success',' Your message was received successfully..We will get back to you soon');
      
    }

    public function postcontact2(Request $request)
    {
        $this->validate($request,['email'=>'required|email',
        'message=>min:10','phone=>min:10']);

        $data=array(
            'name'=>$request->name,
             'email' =>$request->email,
             'phone'=>$request->phone,
             'bodymessage'=>$request->message
    
        );

        Mail::send('emails.contact',$data,function($message)use($data){

            $message->from($data['email']);
            $message->to('viduladakshitha@gmail.com');
            $message->subject($data['phone']);
        });

        return redirect('/contact2')->with('success',' Your message was received successfully..We will get back to you soon');
      
    }

    public function contact2()
    {
        return view('PatientManagement.contactus2');
    }


    
}
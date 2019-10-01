<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Alert;
use Mail;
use Session;

class PagesController extends Controller
{
    //
    public function index()
    {
       // Alert::message('Robots are Working!');
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
        return redirect('/contact')->with('success',' Your message was received successfully..We will get back to you soon');
      
    }


    
}


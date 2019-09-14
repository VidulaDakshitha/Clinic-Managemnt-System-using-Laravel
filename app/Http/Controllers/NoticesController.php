<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function adm()
    {
        return view('ServiceAdmin');
    }

    
    public function serv()
    {
        return view('AdminServ');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        return view('main.about', compact('notices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chairman.createnotice');
    }

    public function media()
    {
        return view('gallery');
    }

    public function admhome()
    {
        return view('Adhome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:400|required'
        ]);

        if($request->hasFile('image')){
            $fullFileName = $request->image->getClientOriginalName();
            $file = pathinfo($fullFileName, PATHINFO_FILENAME);
            $ext = $request->image->getClientOriginalExtension();

            $fileName = $file.'_'.time().'_'.$ext;

            $path = $request->image->storeAs('public/images', $fileName);
        }
        else{
            $fileName = "noimage.jpg";
        }

        $notice = new Notice();
        $notice->doctor_id = auth()->user()->id;
        $notice->title = $request->title;
        $notice->content = $request->description;
        $notice->image = $fileName;
        $notice->save();

        return redirect('/aboutus')->with('success','New Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        
        if(auth()->user()->id != $notice->doctor_id){
            return redirect('/chairman.aboutus')->with('error', 'Unauthorized to edit that particular post');
        }
        

        return view('chairman.editnotice', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:400'
        ]);

        if($request->hasFile('image')){
            $fullFileName = $request->image->getClientOriginalName();
            $file = pathinfo($fullFileName, PATHINFO_FILENAME);
            $ext = $request->image->getClientOriginalExtension();

            $fileName = $file.'_'.time().'_'.$ext;

            $path = $request->image->storeAs('public/images', $fileName);
        }

        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->content = $request->description;
        if($request->hasFile('image')){
            $notice->image = $fileName;
        }

        $notice->save();
        return redirect('/aboutus')->with('success','Post Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect('/aboutus')->with('success','Post Deleted');
    }
}

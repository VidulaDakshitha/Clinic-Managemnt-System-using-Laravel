<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
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
        return view('chairman.adminpage');
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
        $posts = Post::all();
        return view('main.service', compact('posts'));
    }

    public function adminpost()
    {
        $posts = Post::all();
        return view('chairman.adminpage', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chairman.createservice');
    }

    public function media()
    {
        return view('gallery');
    }

    public function admhome()
    {
        return view('chairman.adminpage');
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

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        $post->image = $fileName;
        $post->save();

        return redirect('/ServiceTest')->with('success','New Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        if(auth()->user()->id != $post->user_id){
            return redirect('/ServiceTest')->with('error', 'Unauthorized to edit that particular post');
        }
        

        return view('chairman.editservice', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
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

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->hasFile('image')){
            $post->image = $fileName;
        }

        $post->save();
        return redirect('/ServiceTest')->with('success','Post Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('ServiceTest')->with('success','Post Deleted');
    }
}

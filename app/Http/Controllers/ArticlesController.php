<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
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
        $articles = Article::all();
        return view('chairman.gallerypage', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chairman.creategallery');
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
            'image' => 'image|nullable|max:500|required'
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

        $article = new Article();
        $article->doctor_id = auth()->user()->id;
        $article->title = $request->title;
        $article->content = $request->description;
        $article->image = $fileName;
        $article->save();

        return redirect('/gallery')->with('success','New Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        
        if(auth()->user()->id != $article->doctor_id){
            return redirect('/gallery')->with('error', 'Unauthorized to edit that particular post');
        }
        

        return view('chairman.editgallery', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:500'
        ]);

        if($request->hasFile('image')){
            $fullFileName = $request->image->getClientOriginalName();
            $file = pathinfo($fullFileName, PATHINFO_FILENAME);
            $ext = $request->image->getClientOriginalExtension();

            $fileName = $file.'_'.time().'_'.$ext;

            $path = $request->image->storeAs('public/images', $fileName);
        }

        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->description;
        if($request->hasFile('image')){
            $article->image = $fileName;
        }

        $article->save();
        return redirect('/gallery')->with('success','Post Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/gallery')->with('success','Post Deleted');
    }
}

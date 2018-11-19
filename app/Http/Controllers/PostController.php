<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(4);
        $totalPosts = Post::count();
        return view('posts.index',compact('posts','totalPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required|max:500',
            'coverImage'=> 'image|mimes:jpeg,bmp,png|max:1999'
        ]);

        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('coverImage')->storeAs('public/coverImages',$fileToStore);
            
        } else {
            $fileToStore = 'noimage.png' ;
        }

        $post = new Post() ;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image= $fileToStore;
        $post->save();

        return redirect('/posts')->with('status','Post was created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $post = Post::find($id);
        if (Auth::user()->id != $post->user_id) {
            return redirect('/posts')->with('error','Unauthorized access');
        }
        return view('posts.edit', compact('post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect('/posts')->with('status','Post was updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (Auth::user()->id != $post->user_id) {
            return redirect('/posts')->with('error','Unauthorized access');
        }
        $post->delete();
        return redirect('/posts')->with('status','Post was deleted !!');
    }
}

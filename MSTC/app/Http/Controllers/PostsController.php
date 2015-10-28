<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Vertical;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentverticals = Auth::user()->verticals;  
        return view('posts.index',compact('currentverticals'));
    }

    public function post_vertical($vertical_id)
    {
        $currentverticals = Auth::user()->verticals;
        $posts = Vertical::findOrfail($vertical_id)->posts;

        return view('posts.index',compact('posts', 'currentverticals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $verticals = User::findOrfail(Auth::user()->id)->verticals->lists('name','id');
        return view('posts.create', compact('verticals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::user()->id;
        $post->vertical_id = $request->input('vertical')['0']; 
        $post->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentuser = Auth::user()->id;
        $post = Post::findOrfail($id);
        if(!is_null(Auth::user()->verticals()->where('id', '=', $post->vertical_id)) || $post->user_id == Auth::user()->id){
            return view('posts.show',compact('post','currentuser'));
        }else{
            return response(view('errors.404'), 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentuser = Auth::user()->id;
        $post = Post::findOrfail($id);
        $verticals = User::findOrfail(Auth::user()->id)->verticals->lists('name','id');
        return view('posts.edit',compact('post', 'verticals', 'currentuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrfail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::user()->id;
        $post->vertical_id = $request->input('vertical')['0']; 
        $post->update();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        if($post->user_id == Auth::user()->id){
            $post->delete();
            return redirect('posts');
        }else{
             return response(view('errors.404'), 404);
        }      
    }
}

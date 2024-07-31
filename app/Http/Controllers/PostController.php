<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::with('user','comments.user')->get()->dd();
        $posts = Post::select('id','uuid','title','content','author')->with(['user'=>function($q){
            $q->select('id','name','email');
        },'comments'=>function($q){
            $q->select('post_id','content','user_id');
        },'comments.user'=>function($q){
            $q->select('id','name');
        }])->get(); //eager loading

        $users = User::pluck('name','id');

        // $posts = Post::all(); //lazy loading
        // 57498
        // return response()->json($posts);

        // count
        // $posts = Post::withCount('comments')->get();

        // $posts = Post::whereHas('comments')->count();

        // $posts = Post::whereDoesntHave('comments')->count();

        // $posts = Post::whereHas('comments',function($q){
        //     $q->where('user_id', 3);
        // })->get();

        // $posts = Post::with(['comments' => function($q){
        //     $q->where('user_id', 3);
        // }])->get();

        // gabung query utk dapatkan : Post yang hanya ada comments dari user_id=3, kemudian comments yg hanya dari user_id=3
        // $posts = Post::whereHas('comments',function($query){
        //     $query->where('user_id',3);
        // })->get();

        // $posts = Post::whereHas('comments',function($query){
        //     $query->where('user_id',3);
        // })->with(['comments'=>function($query){
        //     $query->where('user_id',3);
        // }])->get();

        // return view('posts.comment', compact('posts'));

        return view('posts.index',compact('posts','users'));

    }

    function ajaxloadpost(Request $request) {
        try {
            $post = Post::where('uuid',$request->uuid)->first();
        } catch (\Throwable $th) {
            abort(404);
        }

        return response()->json($post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $posts = Post::where('uuid',$post)->get(); //dd($posts);

        $users = User::pluck('name','id');

        $post = $post->load('user.posts','comments.user.posts');

        return view('posts.show',compact('post','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::with('user','comments.user')->get()->dd();
        // $posts = Post::select('id','title','content','author')->with(['user'=>function($q){
        //     $q->select('id','name','email');
        // },'comments'=>function($q){
        //     $q->select('post_id','content','user_id');
        // },'comments.user'=>function($q){
        //     $q->select('id','name');
        // }])->get(); //eager loading




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

        $posts = Post::whereHas('comments',function($query){
            $query->where('user_id',3);
        })->with(['comments'=>function($query){
            $query->where('user_id',3);
        }])->get();

        // return view('posts.comment', compact('posts'));

        return view('posts.index',compact('posts'));

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
        $user = User::find($request->user_id);
        $user->comments()->create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $posts = Post::where('uuid',$post)->get(); //dd($posts);

        return view('posts.index',compact('posts'));
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

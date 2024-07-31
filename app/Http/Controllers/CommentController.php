<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreRequest;
use Ramsey\Uuid\Uuid;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {
        
        $post = Post::find($request->post_id);

        $comment = new Comment;
        $comment -> uuid = Uuid::uuid4();
        $comment -> post_id = $request->post_id;
        $comment -> user_id = $request->author;
        $comment -> content = $request->content;
        $comment -> save();

        return redirect()->route('posts.show',['post'=>$post->uuid]);
    }
}

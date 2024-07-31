<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// DB::listen(function ($event) {
//     dump($event->sql);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{user}/show', function (User $user){
    return $user;
});

Route::get('posts', [PostController::class,'index'])->name('posts.index');


Route::get('posts/{post}/show', [PostController::class,'show'])->name('posts.show');



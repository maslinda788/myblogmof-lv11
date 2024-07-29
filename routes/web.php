<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{user}/show', function (User $user){
    return $user;
});

Route::resource('post', PostController::class);




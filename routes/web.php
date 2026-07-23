<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Loader\Configurator\Routes;

Route::get('/', function () {
    //only show current user posts
    $posts = [];
    /** @var \App\Models\User $user */
    $user = Auth::user();
    if($user){
        $posts = $user->userPosts()->latest()->get();
        
        }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, "createPost"]);
Route::get('/edit-post/{post}', [PostController::class, "showEditScreen"]);
Route::put('/edit-post/{post}', [PostController::class, "updatePost"]);
Route::delete('/delete-post/{post}', [PostController::class, "deletePost"]);

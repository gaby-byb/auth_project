<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Loader\Configurator\Routes;

Route::get('/', function () {
    /** @var \App\Models\User $user */
    $user = Auth::user();
    $posts = $user->userPosts()->latest()->get();
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, "createPost"]);
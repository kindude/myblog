<?php

use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});


Route::get('posts', function () {

    return view('posts.posts', [
        'posts' => Post::latest('published_at')->with(['category', 'author'])->get()
    ]);
});

Route::get('posts/{post}', function (Post $post) {

    return view('posts.post', [
        'post' => $post
    ]);

});


Route::get('categories/{category}', function (Category $category) {
    return view('posts.posts', [
        'posts' => $category->posts
    ]);
});


Route::get('authors/{author}', function (User $author) {
    return view('posts.posts', [
        'posts' => $author->posts
    ]);
});


Route::get('posts/create-post', function () {
    return view('create-post');
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [Sessionscontroller::class, 'destroy'])->middleware('auth');;
Route::get('login', [Sessionscontroller::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionsController::class, 'store']);



Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

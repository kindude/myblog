<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
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

    return view('home.index');
});


Route::get('posts', [PostController::class, 'index'])->where('page', '[0-9]+');

Route::get('posts/create-post', [PostController::class, 'show']) -> middleware('auth');


Route::post('posts/create-post', [PostController::class, 'store']) ->middleware('auth');


Route::get('posts/{post}', function (Post $post) {

    return view('posts.post', [
        'post' => $post
    ]);

});


Route::get('categories/{category}', function (Category $category) {
    $posts = $category->posts()->paginate(2);

    if ($posts->isEmpty()) {
        return view('components.notfound');
    }

    return view('posts.posts', [
        'posts' => $posts
    ]);
});

Route::get('authors/{author}', function (User $author) {
    if(!$author -> posts -> isEmpty()) {

        return view('posts.posts', [
            'posts' => $author->posts
        ]);
    }
    else
    {
        return view('components.notfound');
    }
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [Sessionscontroller::class, 'destroy'])->middleware('auth');;
Route::get('login', [Sessionscontroller::class, 'create'])->middleware('guest');

Route::post('sessions', [SessionsController::class, 'store']);


Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');


Route::post('add-category', [CategoryController::class, 'store'])->middleware('auth');


Route::get('posts/delete/{id}', [PostController::class, 'destroy']) -> middleware('auth');

Route::get('posts/update/{post}', function(Post $post){
    $categories = Category::all();
    return view('posts.update-post', [
        'post' => $post,
        'categories' => $categories
    ]);
});

Route::post('posts/update/{id}', [PostController::class, 'update']) -> middleware('auth');


Route::get('/profile', function() {
    $user = auth()->user();
    return view('profile.myprofile', [
        'user'=> $user
    ]);
}) ->middleware('auth');


// Contacts
Route::get('/contact', function(){
    return view('contact.index');
});

// Home
Route::get('/home', function(){
    return view('home.index');
});

// Portfolio
Route::get('/portfolio', function (){
   return view('portfolio.index');
});

// About
Route::get('/about', function(){
    return view('about.index');
});

// Users
Route::get('/admin', [AdminController::class, 'index']) ->middleware('admin');


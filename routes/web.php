<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

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

    $document = 
    // return view('welcome');

    ddd($document->body());
});


Route::get('posts', function () {

    return view('posts', [
        'posts' =>  Post::allFiles()
    ]);
});

Route::get('posts/{post}', function($slug){

    return view('post', ['post' => Post::find($slug)]);
    
})->where('post', '[A-z_\-]+');

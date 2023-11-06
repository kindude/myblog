<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function show()
    {
        $categories = Category::all();
        return view('posts.create-post', [
            'categories'=> $categories
        ]);

    }


    public function store()
    {

        $attributes = request()->validate([
            'title' => ['required',],
            'body' => ['required', ],
            'category_id' => ['required'],
        ]);


        if (request()->hasFile('image')) {
            $upload = request()->file('image');
            $path = $upload->store('uploads');
            $attributes['image_url'] = $path;
        }

        $attributes['user_id'] = auth()->id();

        $attributes['excerpt'] = Str::limit($attributes['body'], 150, '...');
        $attributes['slug'] = Str::slug($attributes['title'], '-');

        Post::create($attributes);

        return redirect('/posts');
    }

}

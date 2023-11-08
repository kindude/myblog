<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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


//        if (request()->hasFile('image')) {
//            $upload = request()->file('image');
//            $path = $upload->store('uploads');
//            $attributes['image_url'] = $path;
//        }

//        $path = Storage::disk('dropbox')->putFileAs(
//            '/uploads', request()->file('image'), request()->file('image')->getClientOriginalName()
//        );
        $path = request('image')->store('uploads');
//        $path = Storage::disk('dropbox')->put('/uploads', request()->file('image'));

        $attributes['image_url'] = $path;

        $attributes['user_id'] = auth()->id();

        $attributes['excerpt'] = '<p>' . Str::limit($attributes['body'], 150, '...') . '</p>';
        $attributes['excerpt'] = str_replace('"', '', $attributes['excerpt']);
        $attributes['slug'] = Str::slug($attributes['title'], '-');

        Post::create($attributes);

        return redirect('/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post has been deleted');
    }

}

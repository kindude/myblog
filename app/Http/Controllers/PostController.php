<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Rules\ValidImageFilename;

class PostController extends Controller
{

    public function show()
    {
        $categories = Category::all();
        return view('posts.create-post', [
            'categories'=> $categories
        ]);

    }

    public function index(Request $request)
    {
        $perPage = 6;
        $page = $request->query('page', 1);

        $posts = Post::latest('published_at')
            ->with(['category', 'author'])
            ->paginate($perPage, ['*'], 'page', $page);
        
        if ($posts->isEmpty()){
            return view('components.notfound');
        }

        return view('posts.posts', [
            'posts' => $posts,
            'page' => 1,
        ]);
    }


    public function store()
    {

        $attributes = request()->validate([
            'title' => ['required',],
            'body' => ['required', ],
            'category_id' => ['required'],
        ]);

        $validator = \Validator::make(request()->all(), [
            'image' => [new ValidImageFilename()],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $path = request()->file('image')->store('public/uploads', 'public');
        $attributes['image_url'] = 'uploads/' . basename($path);
        $attributes['image_url'] = $path;
        $attributes['user_id'] = auth()->id();

        $attributes['excerpt'] = Str::limit($attributes['body'], 150, '...') ;
        $attributes['slug'] = Str::slug($attributes['title'], '-');

        Post::create($attributes);

        return redirect('/posts');
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        $attributes = request()->validate([
            'title' => ['required',],
            'body' => ['required', ],
            'category_id' => ['required'],
        ]);
        request()->validate([
            'image'=> ['required']
        ]);

        $validator = \Validator::make(request()->all(), [
            'image' => [new ValidImageFilename()],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $path = request()->file('image')->store('public/uploads', 'public');
        $attributes['image_url'] = 'uploads/' . basename($path);
        $attributes['image_url'] = $path;

        $attributes['excerpt'] = Str::limit($attributes['body'], 150, '...');
        $attributes['slug'] = Str::slug($attributes['title'], '-');

        $post->fill($attributes);

        $post->save();

        return redirect('posts/' . $post->slug) ->with('success', 'Post has been updated successfully');

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post has been deleted');
    }

}

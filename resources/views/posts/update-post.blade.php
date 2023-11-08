@props(['post', 'categories'])

<x-layout>
    <div class="max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Update Post</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded focus:outline-none" required value="{{ old('title', $post->title) }}">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-gray-700">Text</label>
                <textarea id="body" name="body" class="w-full px-4 py-2 border rounded focus:outline-none" rows="6" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-400 text-xl uppercase">{{$category->name}}</option>>
                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border rounded focus:outline-none">
            </div>
            @if($post->author->id == auth()->id())
                <div>
                    <a href="/posts/delete/{{ $post->id }}" class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-700">Delete</a>
                </div>
                <div>
                    <a href="/posts/update/{{ $post ->slug }}" class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-700">Update</a>
                </div>

            @endif
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Update Post</button>
            </div>
        </form>
    </div>
</x-layout>


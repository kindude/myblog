<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Posts</h1>
        <a href="/posts/create-post" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Post</a>
    </div>
    @foreach ($posts as $post)
        <article class="mb-6">
            <h1 class="text-2xl font-bold">
                <a href="/posts/{{ $post->slug }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
            </h1>

            <p class="text-gray-600 text-sm">
                By <a href="/authors/{{ $post->author->username }}" class="text-blue-500 hover:underline">{{ $post->author->name }}</a>
                in <a href="/categories/{{ $post->category->slug }}" class="text-blue-500 hover:underline">{{ $post->category->name }}</a>
            </p>

            <div class="mt-2 text-gray-800">
                {{ $post->excerpt }}
            </div>
            <br/>
            <div class="text-gray-600 text-sm">
                {{ $post -> published_at }}
            </div>
        </article>
    @endforeach
</x-layout>

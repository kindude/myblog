<x-layout>
    <div class="container h-max">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Posts</h1>
            @auth
                <a href="/posts/create-post" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Post</a>
            @endauth
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 ml-20">
            @foreach ($posts as $post)
                <div>
                    <x-post-card :post="$post"/>
                </div>
            @endforeach
        </div>
        <div class="mb-0 text-gray-700 border border-gray-500">
            {{ $posts->appends(['page' => $posts->currentPage()])->links() }}
        </div>
    </div>

</x-layout>


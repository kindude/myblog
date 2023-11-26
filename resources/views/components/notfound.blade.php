<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Posts</h1>
        @auth
            <a href="/posts/create-post" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Post</a>
        @endauth
    </div>
    <h1 class="justify-center text-gray-400 text-lg"> Information Not Found</h1>
</x-layout>




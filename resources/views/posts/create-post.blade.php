<x-layout>
    <div class="max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create New Post</h1>
        <form action="/create-post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded focus:outline-none" required>
            </div>

            <div class="mb-4">
                <label for="text" class="block text-gray-700">Text</label>
                <textarea id="text" name="text" class="w-full px-4 py-2 border rounded focus:outline-none" rows="6" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border rounded focus:outline-none" required>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Create Post</button>
            </div>
        </form>
    </div>
</x-layout>


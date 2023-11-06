@props(['categories'])

<x-layout>
    <div class="max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create New Post</h1>
        <form action="/posts/create-post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded focus:outline-none" required  value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-gray-700">Text</label>
                <textarea id="body" name="body" class="w-full px-4 py-2 border rounded focus:outline-none" rows="6" required></textarea>
            </div>
            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-400 text-xl uppercase">{{$category->name}}</option>>
                    @endforeach

                </select>

                <button
                    id="openCategoryModal"
                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 focus:outline-none mt-4"
                >
                    Add Category
                </button>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border rounded focus:outline-none" required value="{{ old('image') }}">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Create Post</button>
            </div>
        </form>

        <div
            id="categoryModal"
            class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-80 z-50 hidden"
        >
            <div class="bg-white p-4 rounded-lg max-w-md">
                <form method="post" action="/add-category">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Category Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded focus:outline-none" required>
                    </div>

                    <div class="mb-4">
                        <label for="text" class="block text-gray-700">Category Slug</label>
                        <input type="text" id="slug" name="slug" class="w-full px-4 py-2 border rounded focus:outline-none" required>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Create Category</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>

<script>
    const openCategoryModalButton = document.getElementById('openCategoryModal');
    const categoryModal = document.getElementById('categoryModal');

    openCategoryModalButton.addEventListener('click', () => {
        categoryModal.classList.remove('hidden');
    });

    categoryModal.addEventListener('click', (event) => {
        if (event.target === categoryModal) {
            categoryModal.classList.add('hidden');
        }
    });
</script>

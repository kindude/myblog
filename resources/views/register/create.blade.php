<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-150 p-6 rounded-xl">
            <h1 class="text-2xl font-bold mb-4">Register</h1>
            <form action="/register" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded focus:outline-none" required value="{{ old('username') }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded focus:outline-none" required value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="text" id="email" name="email" class="w-full px-4 py-2 border rounded focus:outline-none" required value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded focus:outline-none" required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border rounded focus:outline-none" value="{{ old('image') }}">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Register</button>
                </div>

                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)

                            <li class="text-red-500 text-xs mt-1" >{{ $error }}</li>

                      @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>

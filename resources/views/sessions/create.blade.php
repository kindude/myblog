<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-150 p-6 rounded-xl">
            <h1 class="text-2xl font-bold mb-4">Log In</h1>
            <form action="/sessions" method="post">
                @csrf

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

                <div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Log In</button>
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

<x-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">User List</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- User Cards -->
            @foreach($users as $user)
                <div class="bg-white rounded shadow-md p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    <p class="text-gray-600">Registered: {{ $user->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            <!-- Total User Count -->
            <p class="text-lg font-semibold mb-4">Total Users: {{ count($users) }}</p>

        </div>
    </div>
</x-layout>

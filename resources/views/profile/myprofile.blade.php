<x-layout>
    <div class="p-4 bg-white rounded-sm shadow-md">
    <div class="flex justify-center">
        @if ($user->avatar_url != '#')
            <img src="{{ $user->avatar_url }}" alt="User Avatar" class="w-32 h-32 rounded-full">
        @else
            <img src="{{ asset('storage/public/uploads/Blank-Avatar.png') }}" alt="User Avatar" class="w-32 h-32 rounded-full">
        @endif
    </div>

        <div class="mt-4 text-center">
            <h2 class="text-2xl font-semibold">{{ $user->username }}</h2>
            <p class="text-lg text-gray-600">{{ $user->name }}</p>
        </div>

        <div class="mt-6">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-lg text-green-500">{{ $user->email }}</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-md shadow-md">
                <p class="text-xl font-semibold">{{ $user->name }}</p>
                <p class="text-gray-500 text-sm">
                    Member since {{ $user->created_at->format('F j, Y') }}
                </p>
            </div>
        </div>
    </div>
</x-layout>

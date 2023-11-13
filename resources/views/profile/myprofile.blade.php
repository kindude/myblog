<x-layout>
    <div class="p-4 bg-white rounded-lg shadow-md">
        <div class="flex justify-center">
            <img src="{{ $user->avatar_url ? $user->avatar_url : asset('storage/public/uploads/Blank-Avatar.png') }}" alt="User Avatar" class="w-32 h-32 rounded-full">
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
            @if ($user->is_verified_email)
                <p class="text-sm text-gray-600">Email Verified</p>
            @else
                <p class="text-sm text-red-600">Email Not Verified</p>
            @endif
        </div>
    </div>
</x-layout>

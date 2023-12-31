@props(["post"])

<article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl max-w-md">
    <div class="py-6 px-5 flex flex-col h-full">
        <div class="flex flex-col items-center">
            <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="w-full h-full object-cover object-center mb-2">
        </div>

        <div class="mt-8 flex flex-col justify-between flex-grow">
            <header>
                <div class="space-x-2">
                    <a href="/categories/{{ $post->category->slug }}" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold">{{ $post->category->name }}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>
            <main>
                <div class="text-sm mt-2 flex-grow text-black-500">
                    <p style="white-space: pre-line;">
                        {{ $post->excerpt }}
                    </p>
                </div>
            </main>
            <footer class="flex justify-between items-center mt-4">
                <div class="flex items-center text-sm">
                    @if ($post->author->avatar_url != '#')
                        <img src="{{ $post->author->avatar_url }}" alt="User Avatar" class="w-4 h-4 rounded-full">
                    @else
                        <img src="{{ asset('storage/public/uploads/Blank-Avatar.png') }}" alt="User Avatar" class="w-4 h-4 rounded-full">
                    @endif
                    <div class="ml-3">
                        <h5 class="font-bold">{{ $post->author->name }}</h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read More</a>
                </div>
            </footer>

        </div>
    </div>
</article>



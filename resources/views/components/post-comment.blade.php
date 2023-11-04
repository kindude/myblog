@props(['comment'])

<x-panel class="bg-gray-100">
<article class="grid grid-cols-2 bg-gray-100 px-6 py-8">
    <div class="col-span-1 flex items-center">
        <img src="https://i.pravatar.cc/100" alt="" class="w-12 h-12 rounded-full">
        <div class="ml-4">
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">Posted <time>{{ $comment->created_at->format('F j, Y, g:i, a') }}</time></p>
            </header>
        </div>
    </div>
    <div class="col-span-2 mt-2 mb-5">
        <p>
          {{ $comment->body }}
        </p>
    </div>
</article>
</x-panel>

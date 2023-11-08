<x-layout>
    <main class="grid grid-cols-12">
    <section class="px-6 py-8 col-start-3 col-end-11">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold mb-4">{!! $post->title !!}</h1>

                <div class="flex flex-col items-center">
                    <img src="{{ Storage::disk('dropbox')->url($post->image_url) }}" alt="{{ $post->title }}" class="w-full h-full object-cover object-center mb-2">
                </div>

                <p class="text-gray-600 text-sm mb-2">
                    By <a href="/authors/{{ $post->author->username }}" class="text-blue-500 hover:underline">{{ $post->author->name }}</a>
                    in <a href="/categories/{{ $post->category->slug }}" class="text-blue-500 hover:underline">{{ $post->category->name }}</a>
                </p>
                <div class="text-gray-800 max-w-2xl">
                    {!! $post->body !!}
                </div>
                <a href="/posts" class="mt-4 inline-block text-blue-500 hover:underline">Go back</a>
            </article>
            @if($post->author->id == auth()->id())
                <div>
                    <a href="/posts/delete/{{ $post->id }}" class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-700">Delete</a>
                </div>
                <div>
                    <a href="/posts/update/{{ $post ->slug }}" class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-700">Update</a>
                </div>

            @endif

        </main>
    </section>

        <section class="px-6 py-8 col-start-3 col-end-11 row-start-2 space-y-6">
            @auth
            <x-panel>
            <form method="post" action="/posts/{{ $post -> slug }}/comments">
                @csrf
                <header class="flex items-center">
                    <img src="https://i.pravatar.cc/100" alt="" class="w-12 h-12 rounded-full">
                    <h2 class="ml-4">Want to leave a comment ? </h2>

                </header>

                <div class="mt-6">
                    <textarea name="body" class="w-full focus:outline-none focus:ring" rows="5" placeholder="Write anything you want to say..."></textarea>
                </div>

                <div class="flex justify-end mt-10 border-t border-gray-100 pt-6">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-700">Post</button>
                </div>

            </form>
            </x-panel>

            @else
                <p class="font-semibold">
                    <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to comment.
                </p>

            @endauth



            @foreach($post -> comments as $comment)
                <x-post-comment :comment="$comment" />
            @endforeach


        </section>

    </main>
</x-layout>

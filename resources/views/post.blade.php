<x-layout>
<section>
        <h1> {{ $post->title }}</h1>
        <div> {!! $post->body !!}</div>
    </section>
    <a href="/posts">Go back</a>
</x-layout>
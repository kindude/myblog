<x-layout>
<section>
        <h1> {!! $post->title !!}</h1>
    <p>
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>

    </p>
        <div> {!! $post->body !!}</div>
    </section>
    <a href="/posts">Go back</a>
</x-layout>

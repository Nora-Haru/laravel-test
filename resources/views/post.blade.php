@extends('layouts.main')

@section('container')

    <div class="container mt-5">
        <div class="columns is-centered">
            <div class="column is-half">
                <h2 class="title is-2">{{ $post->title }}</h2>
                <p class="mb-2">
                    <small class="has-text-grey">
                        By. <a href="/posts?author={{ $post->author->username }}" class="has-text-link">{{ $post->author->name }}</a>
                        | <a href="/posts?category={{ $post->category->slug }}" class="has-text-link">{{ $post->category->name }}</a>
                        | {{ $post->created_at->diffForHumans() }}
                    </small>
                </p>
                <hr>
                @if ($post->image)
                <div style="min-height: 100px; overflow: hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="image" alt="{{ $post->category->name }}">
                </div>
                @else
                    <img src="https://source.unsplash.com/1024x576?{{ $post->category->name }}" class="image" alt="{{ $post->category->name }}">
                @endif
                <hr>
                <article class="content my-3">
                    {!! $post->body !!}
                </article>
                <a href="/posts" class="is-block mb-5">Back to Post</a>
            </div>
        </div>
    </div>
    
@endsection

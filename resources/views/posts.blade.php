@extends('layouts.main')

@section('container')


@if ($posts->count())
    <hr><p class="home-header1 title is-3 has-text-centered has-text">{{ $title }}</p><hr>
    @include('partials.search-box')
    <div class="container-fluid mt-4">
        <div class="columns is-multiline">
            @foreach ($posts as $post)
                    <div class="column is-4">
                        <div class="card">
                            <div class="card-content">
                                <div class="image-container" style="height: 300px; overflow: hidden;"> 
                                    @if ($post->image) 
                                        <img src="{{ asset('storage/' . $post->image) }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                                    @else 
                                        <img src="https://source.unsplash.com/1024x576?{{ $post->category->name }}" class="image" style="object-fit: cover; width: 100%; height: 100%;" alt="{{ $post->category->name }}"> 
                                    @endif 
                                </div>
                            </div>
                            <div class="card-content has-background-white">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://source.unsplash.com/500x500?{{ $post->author->name }}" alt="Placeholder image" class="is-rounded"/>
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4 has-text-grey-dark">
                                            {{ $post->author->name }}
                                        </p>
                                        <p class="subtitle is-6 has-text-grey">
                                            @.{{ $post->author->username }}
                                        </p>
                                    </div>
                                </div>
                                <div class="content has-text-grey">
                                    <div class="content"> 
                                        <h5 class="title is-5 mt-2">{{ $post->title }}</h5> 
                                        <p>{{ $post->excerpt }}</p> 
                                        <div class="mt-auto"> 
                                            <p class="mb-0"> 
                                                <small class="has-text-grey"> 
                                                    By. <a href="/posts?author={{ $post->author->username }}" class="has-text-link">{{ $post->author->name }}</a> 
                                                    | <a href="/posts?category={{ $post->category->slug }}" class="has-text-link">{{ $post->category->name }}</a> 
                                                    | {{ $post->created_at->diffForHumans() }} 
                                                </small> 
                                            </p> 
                                            <p class="mb-0"> 
                                                <small><a href="/posts/{{ $post->slug }}">Read More...</a></small> 
                                            </p> 
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
        <hr class="mb-5">
    @else
        <p class="has-text-centered title is-4" id="lr-mb-extra">Not found</p>
    @endif

    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{ $posts->links() }}
      </nav>
        <hr class="mb-5">
        
@endsection
